<?php namespace ActivoFijo\Http\Controllers;

use DB;
use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para Activo Fijo
use ActivoFijo\ActivoFijo;
//modelo para Movimiento
use ActivoFijo\Movimiento;
//modelo para Proveedor
use ActivoFijo\Proveedor;
//modelo Adquisicion
use ActivoFijo\TipoAdquisicion;
//modelo Rubro
use ActivoFijo\Rubro;
//modelo Empleado
use ActivoFijo\Empleado;
//modelo Oficina
use ActivoFijo\Oficina;
//modelo Detalles
use ActivoFijo\Detalles;
//modelo MovtosDetalle
use ActivoFijo\MovtosDetalle;
//Request Validator
use ActivoFijo\Http\Requests\ActivoFijos;
//Excel
use Maatwebsite\Excel\Facades\Excel;

class ActivoFijoController extends Controller {


	//autenticacion
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
				
		//manejo de bajas
		$segmento1=$request->segment(1);
		//no se muestran las bajas
		$baja=0;

		if($segmento1=="baja"){
			$tipo = $request->segment(2);
			//solo se buscan las bajas
			$baja=1;
		}
		elseif($segmento1=="bajadefinitiva"){
			$tipo = $request->segment(2);
			$baja=2;
		}
		else{
			$tipo=$segmento1;
		}

		$t=strtoupper(substr($tipo,0,1));

		//Busqueda
		$clave = $request->get('Clave');
		$numinv = $request->get('NumInv');
		$desc = $request->get('desc');
		$descemp=$request->get('DescEmp');
		$descofna=$request->get('DescOfna');
		
		/*
		$activoestatal = ActivoFijo::where('TpoBien',$t)
			->whereRaw("NOT Edo like '%BAJA%'")
			->clave($clave)
			->descripcion($desc)
			->numinv($numinv)
			->paginate();
		*/

		DB::enableQueryLog();
		$activofijo = Detalles::where('TpoBien',$t)
		//ambos estado para evitar las inconsistencias
		->where('ultimo',1)
		->baja($baja)
		->clave($clave)
		->descripcion($desc)
		->numinv($numinv)
		->descemp($descemp)
		->descofna($descofna)
		->paginate();

		//print_r(DB::getQueryLog());
		
		$costo=0;
		foreach ($activofijo as $af) {
			$costo+=$af->Costo;
		}
		$activofijo->setPath('activofijo');

		$proveedores = Proveedor::all();

	
		$url=$request->path();
		$urlCreate=$url.'/create';


		return view('activofijo.index', compact('clave','numinv','activofijo', 'proveedores','tipo','urlCreate','t','baja','costo','url'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$activofijo=new ActivoFijo;
		$tipo= $request->segment(1);
		$activofijo->TpoBien=strtoupper(substr($tipo,0,1));
		//$oficinasemp=Empleado::where('Baja',0)->lists('IdOfna','IdEmp');
		$empleados=Empleado::where('Baja',0)->get();
		//$empleados=\DB::table('02empleados')->where('Baja',0)->get();
		 	//->get();
		//dd($empleados);
		$oficinas=Oficina::all();
		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		//crea detalle por default
		$detalle=new MovtosDetalle;
		//asigna valores por defecto
		$detalle->FecMovto=date('Y-m-d');
		$activofijo->FecAlta=date('Y-m-d');
		$detalle->IdEmp='G439';
		$detalle->Ubicac='300C5';
		$detalle->EdoDelBien="1. BUENO";
		$activofijo->Edo="1. BUENO";
		//crea un arreglo
		$detalles=[$detalle];
		$activofijo->detalle=$detalle;

		return view('activofijo.create', compact('detalles','activofijo','tipo','proveedores','adquisicion','rubro','empleados','oficinas','oficinasemp'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ActivoFijos $actest)
	{
		//numero inicial
		$inicio=$actest->input('NumInv');
		//valida que sea un registro masivo
		if($actest->input('masivo')==1)
			$fin=$actest->input('NumInvfinal');
		else
			$fin=$actest->input('NumInv');

		//guarda todos los numeros indicados
		for ($i=$inicio; $i <=$fin ; $i++) {
	        $o= new ActivoFijo();
	        $tipo=$actest->segment(1);
	        $o->Gpo=$actest->input('Gpo');
	        $o->Clave=$actest->input('Clave');
	        //asigna el numero de inventario consecutivo
	        $o->NumInv=$i;
	        $o->TpoBien=strtoupper(substr($tipo,0,1));
	        $o->AnoPrg=$actest->input('AnoPrg');
	        $o->Denomin=$actest->input('Denomin');
	        $o->FecAlta=$actest->input('FecAlta');
	        $o->DescArt=$actest->input('DescArt');
	        $o->Clave=$actest->input('Clave');
	        $o->IdProv=$actest->input('IdProv');
	        $o->NumFact=$actest->input('NumFact');
	        $o->FecFact=$actest->input('FecFact');
	        $o->Costo=$actest->input('Costo');
	        $o->IdTipAdq=$actest->input('IdTipAdq');
	        $o->IdRub=$actest->input('IdRub');
	        $o->Edo=$actest->input('Edo');
	        $o->Localiz=$actest->input('Localiz');

	        //guarda los datos
	        $o->save();

	        //Guarda el detalle
	        $d=$actest->input('detalle');

	        $detalle=new MovtosDetalle;

	        $detalle->Movto=$o->Movto;
	        $detalle->FecMovto=$d['FecMovto'];
	        $detalle->Ubicac=$d['Ubicac'];
	        $detalle->IdEmp=$d['IdEmp'];
	        $detalle->EdoDelBien=$d['EdoDelBien'];
	        $detalle->Ultimo=1;
	        //limpiar el ultimo

	        MovtosDetalle::where('Ultimo',1)
	        	->where('Movto',$o->Movto)
	        	->update(['Ultimo'=>0]);

	        $detalle->save();
        }

		//se notifica
        flash()->success('Se ha registrado correctamente.');

        //redirecciona al index
        return redirect()->route($tipo.'.activofijo.index');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Request $request)
	{
		$bien = ActivoFijo::find($id);
		$tipo= $request->segment(1);
		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$empleados=Empleado::where('Baja',0)->get();

		$oficinasemp=Empleado::where('Baja',0)->lists('IdOfna','IdEmp');
		$oficinas=Oficina::all();
		$rubro = Rubro::all();
		return view('activofijo.show',compact('tipo','bien','proveedores','adquisicion','rubro','empleados','oficinas','oficinasemp'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{

		$activofijo = ActivoFijo::find($id);
		//$activofijos = ActivoFijo::all()->lists('Movto','Gpo');
		$tipo= $request->segment(1);

		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		return view('activofijo.edit', compact('activofijo','activofijos','tipo','proveedores','adquisicion','rubro'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ActivoFijos $ac)
	{
		//recupera el tipo para regresar
		$tipo=$ac->segment(1);
		$input = array_except($ac->Input(),array('_token','_method','Movto'));
		$id=$ac->input('Movto');
    	ActivoFijo::where('Movto',$id)->update($input);

   		flash()->success('Se ha guardado los cambios correctamente.');
    	return redirect()->route($tipo.'.activofijo.show',$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $req)
	{
		$tipo=$req->segment(1);
		echo $tipo;
		$o = ActivoFijo::findOrFail($id);
		$o->delete();


		flash()->success('Se ha eleminado correctamente el bien.');
		return redirect()->route($tipo.'.activofijo.index');
	}



	//metodo que devuelve el catalogo de empleados

	public function empleados()
	{
		return DB::table('02empleados')
			->select(DB::raw("IdEmp, concat(idemp,' -- ',descEmp)as DescEmp, IdOfna"))
		 	->where('Baja',0)
		 	->lists('DescEmp','IdEmp');
	}

	/*public function excel(LSSReportExport $export){

        return $export->sheet('sheetName', function($sheet)
        {

            $issues = ActivoFijo::get();

            foreach ($issues as $issue) {
                $LSSReport[$issue->id] = [

                    //$issue->do is a carbon instance 
                    'Date Opened' => PHPExcel_Shared_Date::PHPToExcel($issue->do->timestamp), 

                    //$issue->date_closed is a string: January 13, 2005
                    'Date Closed' => $issue->date_closed,
                ];
            }

           $sheet->setColumnFormat(array(
                'A' => 'yyyy-mm-dd',
                'B' => 'mmmm d, yyyy'
            ))->with($LSSReport);

        })->export('xlsx');
}*/

	public function excel(Request $request)
	{	
		//se crea una array con los parametros necesarios para crear el excel con el request
		$data = Detalles::
			  tipo($request->get('tipo'))
			->clave($request->get('Clave'))
			->descemp($request->get('DescEmp'))
			->descOfna($request->get('DescOfna'))
			->where('ultimo',1)->get();

		//Exportar Excel y el use es para pasar variables en el interior
		Excel::create('ActivoFijo',function($excel) use ($data)
		{
			//se crea la hoja de excel y el use es para pasar variables en el interior
			$excel->sheet('Sheetname', function($sheet) use ($data)
			{	
				//se crea una array con los parametros necesarios para crear el excel
					// $data=Detalles::
					// tipo($request->get('tipo'))
					// ->clave($request->get('Clave'))
					// ->descemp($request->get('DescEmp'))
					// ->get();
					//$data=ActivoFijo::where('TpoBien',0)->get();

				//carga los datos al array
				//array_push($data, array('Kevin','Arnold'));

				//se imprime el array con el from
				$sheet->fromArray($data);
			});
			//return redirect()->route($tipo.'.activofijo.index');
			//return View::make('index');
			return view('activofijo.index');
		})->download('csv');
	}
}

