<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;

//modelo para Activo Estatal
use ActivoFijo\ActivoEstatal;

//modelo para proveedor
use ActivoFijo\Proveedor;
//modelo Adquisicion
use ActivoFijo\TipoAdquisicion;
//modelo Rubro
use ActivoFijo\Rubro;

//Request Validator
//use ActivoFijo\Http\Requests\ActivoEstatales;

class ActivoEstatalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$activoestatal = ActivoEstatal::paginate();
		$proveedores = Proveedor::all();

		return view('activoestatal/index', compact('activoestatal', 'proveedores'));
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$proveedores = Proveedor::all();
		$adquisicion = TipoAdquisicion::all();
		$rubro = Rubro::all();
		$activoestatal = ActivoEstatal::all();
		
		return view('activoestatal.create', compact('activoestatal','proveedores','adquisicion','rubro','descripcion'));
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ActivoEstatales $actest)
	{
		 //Se guardan los valores nuevos
        $o= new ActivoEstatal();
        $o->Movto=$actest->input('Movto');
        $o->Gpo=$actest->input('Gpo');
        $o->Clave=$actest->input('Clave');
        $o->NumInv=$actest->input('NumInv');
        $o->AnoPrg=$actest->input('AnoPrg');
        $o->TpoBien=$actest->input('TpoBien');
        $o->Denomin=$actest->input('Denomin');
        $o->FecAlta=$actest->input('FecAlta');
        $o->DescArt=$actest->input('DescArt');
        $o->NumFact=$actest->input('NumFact');
        $o->FecFact=$actest->input('FecFact');
        $o->Costo=$actest->input('Costo');

        $p= new Proveedor();
        $p->IdProv=$actest->input('IdProv');
        $p->DescProv=$actest->input('DescProv');

        $a= new Adquisicion();
        $o->IdTipAdq=$actest->input('IdTipAdq');
        $o->DescAdq=$actest->input('DescAdq');

        $r= new Rubro();
        $o->IdRub=$actest->input('IdRub');
        $o->DescRub=$actest->input('DescRub');


        $o->Edo=$actest->input('Edo');
        $o->Localiz=$actest->input('Localiz');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('activoestatal.index');
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
