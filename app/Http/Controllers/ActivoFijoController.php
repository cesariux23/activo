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
		$tipo= $request->segment(1);
		$t=strtoupper(substr($tipo,0,1));
		$activoestatal = ActivoFijo::where('TpoBien',$t)->paginate();
		$activoestatal->setPath('activofijo');
		$proveedores = Proveedor::all();
		
		$urlCreate='/'.strtolower($tipo).'/activofijo/create';
		return view('activofijo.index', compact('activoestatal', 'proveedores','tipo','urlCreate'));
		//
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


		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		return view('activofijo.create', compact('activofijo', 'tipo','proveedores','adquisicion','rubro'));
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
        $o->save();
        flash()->success('Se ha registrado correctamente.');
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
		//
		echo ($id);
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

        return view('activofijo.edit', compact('post','ActivoFijos','tipo','proveedores','adquisicion','rubro'));
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
