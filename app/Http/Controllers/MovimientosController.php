<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use ActivoFijo\MovtosDetalle;
//modelo para Activo Fijo
use ActivoFijo\ActivoFijo;

class MovimientosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request)
	{
		//
		//Guarda el detalle
        $d=$request->input('detalle');
        $detalle=new MovtosDetalle;
        $detalle->Movto=$d['Movto'];
        $detalle->FecMovto=$d['FecMovto'];
        $detalle->Ubicac=$d['Ubicac'];
        $detalle->IdEmp=$d['IdEmp'];
        $detalle->EdoDelBien=$d['EdoDelBien'];
        $detalle->Ultimo=1;

        //limpiar el ultimo

        MovtosDetalle::where('Ultimo',1)
        	->where('Movto',$d['Movto'])
        	->update(['Ultimo'=>0]);
        //guarda en la base de datos
        $detalle->save();
         //actualiza el estado del bien al que esta ligado
        $bien=ActivoFijo::find($d['Movto']);
        $bien->Edo=$d['EdoDelBien'];
        $bien->save();
        flash()->success('Se ha registrado correctamente.');
        $tipo=$request->input('tipo');

        //redirecciona al index
        return redirect()->route($tipo.'.activofijo.show',$detalle->Movto);
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

}
