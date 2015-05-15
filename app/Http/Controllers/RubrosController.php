<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para Rubros
use ActivoFijo\Rubro;

//Request Validator
use ActivoFijo\Http\Requests\Rubros;

class RubrosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $rubros = Rubro::paginate();
		 $rubros->setPath('rubros');

		return view('rubros/index', compact('rubros'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$rubros = Rubro::all();

		return view('rubros.create', compact('rubros'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Rubros $rub)
	{
		 //Se guardan los valores nuevos
        $o= new Rubro();
        $o->IdRub=$rub->input('IdRub');
        $o->DescRub=$rub->input('DescRub');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('rubros.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 $post = Rubro::findOrFail($id);

        return view('rubros.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Rubro::find($id);

        return view('rubros.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Rubros $rub)
	{
		
        $input = array_except($rub->Input(),array('_token','_method','IdRub'));
        Rubro::where('IdRub',$rub->Input('IdRub'))->update($input);

        flash()->success('Se ha guardado los cambios correctamente.');
        return redirect()->route('rubros.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$o = Rubro::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente.');
        return redirect()->route('rubros.index');
	}

}
