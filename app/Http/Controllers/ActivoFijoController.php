<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para Activo Fijo
use ActivoFijo\ActivoFijo;
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

//modelo MovtosDetalle
use ActivoFijo\MovtosDetalle;
//Request Validator
use ActivoFijo\Http\Requests\ActivoFijos;

class ActivoFijoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$clave = $request->get('Clave');
		$numinv = $request->get('NumInv');

		$tipo = $request->segment(1);

		$t=strtoupper(substr($tipo,0,1));
		$activoestatal = ActivoFijo::where('TpoBien',$t)->clave($clave)->numinv($numinv)->paginate();
		$activoestatal->setPath('activofijo');

		$proveedores = Proveedor::all();
		
		$urlCreate='/'.strtolower($tipo).'/activofijo/create';

		return view('activofijo.index', compact('clave','numinv','activoestatal', 'proveedores','tipo','urlCreate'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$activofijo=new ActivoFijo;
		$activofijo->TpoBien=
		$tipo= $request->segment(1);
		$activofijo->TpoBien=strtoupper(substr($tipo,0,1));
		$empleados=Empleado::where('Baja',0)->get();
		$oficinas=Oficina::all();
		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		//crea detalle por default
		$detalle=new MovtosDetalle;
		//asigna valores por defecto
		$detalle->FecMovto=date('Y-m-d');
		$detalle->IdEmp='G439';
		$detalle->Ubicac='300C5';
		//crea un arreglo
		$detalles=[$detalle];
		$activofijo->detalle=$detalle;

		return view('activofijo.create', compact('detalles','activofijo', 'tipo','proveedores','adquisicion','rubro', 'empleados','oficinas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ActivoFijos $actest)
	{
		/*
		 //Se guardan los valores nuevos
        $o= new ActivoEstatal();
        $o->Movto=$actest->input('Movto');
        $o->Gpo=$actest->input('Gpo');
        $o->Clave=$actest->input('Clave');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('activoestatal.index');
        */
        $o= new ActivoFijo();
        //$o->Movto=$actest->input('Movto');
        $tipo=$actest->segment(1);
        $o->TpoBien=substr($tipo,0,1);
        $o->Gpo=$actest->input('Gpo');
        $o->Clave=$actest->input('Clave');
        $o->NumInv=$actest->input('NumInv');
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
		$oficinas=Oficina::all();
		$rubro = Rubro::all();

		return view('activofijo.show',compact('tipo','bien','proveedores','adquisicion','rubro','empleados','oficinas'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{
		$post = ActivoFijo::find($id);
		$activofijos = ActivoFijo::all()->lists('Movto','Gpo');
		$tipo= $request->segment(1);

		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		return view('activofijo.edit', compact('post','activofijos','tipo','proveedores','adquisicion','rubro'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ActivoFijos $ac)
	{
		$input = array_except($ac->Input(),array('_token','_method','Movto'));
    	ActivoFijo::where('Movto',$ac->input('Movto'))->update($input);

   		flash()->success('Se ha guardado los cambios correctamente.');
    	return redirect()->route('activofijo.index');
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

}
