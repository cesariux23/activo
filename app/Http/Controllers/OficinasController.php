<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para oficinas
use ActivoFijo\Oficina;
//Request Validator
use ActivoFijo\Http\Requests\Oficinas;

class OficinasController extends Controller {

	/**
     * Display a listing of oficinas
     *
     * @return Response
     */
    public function index()
    {
        $oficinas = Oficina::paginate();
        $oficinas->setPath('adscripciones');

        return view('oficinas.index', compact('oficinas'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        return view('oficinas.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store(Oficinas $of)
    {
        //Se guardan los valores nuevos
        $o= new Oficina();
        $o->IdOfna=$of->input('IdOfna');
        $o->DescOfna=$of->input('DescOfna');
        $o->DirOfna=$of->input('DirOfna');
        $o->save();
    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('adscripciones.index');
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $oficina = Oficina::findOrFail($id);
        //$empleados= $oficina->empleados;

        return view('oficinas.show', compact('oficina'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Oficina::find($id);

        return view('oficinas.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    
    public function update(Oficinas $of)
    {
        //$o = Oficina::find();        
        $input = array_except($of->Input(),array('_token','_method','IdOfna'));
        Oficina::where('IdOfna',$of->input('IdOfna'))->update($input);
        
        flash()->success('Se ha guardado los cambios correctamente.');
        return redirect()->route('adscripciones.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $o = Oficina::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente.');
        return redirect()->route('adscripciones.index');
    }

}
