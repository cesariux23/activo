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
		$activoestatal = ActivoFijo::all();
		$tipo= $request->segment(1);

		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();

		return view('activofijo.create', compact('activoestatal', 'tipo','proveedores','adquisicion','rubro'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ActivoFijo $actest)
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
        echo substr($actest->segment(1),0,1);
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
	public function edit($id)
	{
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
	public function destroy($id)
	{
		 $o = ActivoFijo::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente el empleado.');
        return redirect()->route('empleados.index');
	}

}
