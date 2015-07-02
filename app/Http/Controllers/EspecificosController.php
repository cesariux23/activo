<?php namespace ActivoFijo\Http\Controllers;

use DB;
use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

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

use ActivoFijo\ActivoFijo;

use Illuminate\Http\Request;

class EspecificosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$empleados=$this->empleados();
		
		$oficinasemp=Empleado::where('Baja',0)->lists('IdOfna','IdEmp');
		$oficinas=Oficina::all();
		$rubro = Rubro::all();
		
		return view('especifico.panel', compact('proveedores','oficinasemp','empleados','oficinas','adquisicion','rubro'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		

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
		//
	}

	public function empleados()
	{
		$default=[''=>"-- Seleccione --"];
		$opciones=DB::table('02empleados')
			->select(DB::raw("IdEmp, concat(idemp,' -- ',descEmp)as DescEmp, IdOfna"))
		 	->where('Baja',0)
		 	->lists('DescEmp','IdEmp');
		return $default+$opciones;
	}

}
