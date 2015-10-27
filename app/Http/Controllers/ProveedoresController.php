<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Modelo para Proveedores
use ActivoFijo\Proveedor;

//Request validator
use ActivoFijo\Http\Requests\Proveedores;

class ProveedoresController extends Controller {

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
		//Busqueda
		$nombre=$request->get('DescProv');
        $proveedor=$request->get('IdProv');

		//$proveedores = Proveedor::all();
		$proveedores = Proveedor::paginate();
		$proveedores->setPath('proveedores');

		return view('proveedores.index',compact('proveedores','proveedor','nombre'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$proveedores = Proveedor::all();
		return view('proveedores.create', compact('proveedores'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Proveedores $prov)
	{
		 //Se guardan los valores nuevos
        $o= new Proveedor();
        $o->IdProv=$prov->input('IdProv');
        $o->DescProv=$prov->input('DescProv');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('proveedores.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 $post = Proveedor::findOrFail($id);

        return view('proveedores.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Proveedor::find($id);

        return view('proveedores.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Proveedores $prov)
	{
		 //$o = Oficina::find();        
        $input = array_except($prov->Input(),array('_token','_method','IdProv'));
        Proveedor::where('IdProv',$prov->input('IdProv'))->update($input);
        
        flash()->success('Se ha guardado los cambios correctamente.');
        return redirect()->route('proveedores.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $o = Proveedor::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente.');
        return redirect()->route('proveedores.index');
	}

}
