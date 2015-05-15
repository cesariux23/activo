<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para Tipo de Adquisiciones
use ActivoFijo\TipoAdquisicion;

//Request Validator
use ActivoFijo\Http\Requests\TipoAdquisiciones;

class TipoAdquisicionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *		
	 * @return Response
	 */
	public function index()
	{
		
		$tipoadquisiciones = TipoAdquisicion::paginate();
		$tipoadquisiciones->setPath('tipoadquisiciones');

		return view('tipoadquisiciones/index',compact('tipoadquisiciones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('tipoadquisiciones.create',compact('tipoadquisiciones'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TipoAdquisiciones $tipa)
	{
		 //Se guardan los valores nuevos
        $o= new TipoAdquisicion();
        $o->IdTipAdq=$tipa->input('IdTipAdq');
        $o->DescAdq=$tipa->input('DescAdq');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('tipoadquisiciones.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = TipoAdquisicion::findOrFail($id);

        return view('tipoadquisiciones.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = TipoAdquisicion::find($id);

        return view('tipoadquisiciones.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
				//$o = Oficina::find();        
        $input = array_except($request->Input(),array('_token','_method','IdTipAdq'));
        TipoAdquisicion::where('IdTipAdq',$request->input('IdTipAdq'))->update($input);

        flash()->success('Se ha guardado los cambios correctamente.');
        return redirect()->route('tipoadquisiciones.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$o = TipoAdquisicion::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente.');
        return redirect()->route('tipoadquisiciones.index');
	}

}
