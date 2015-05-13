<?php namespace ActivoFijo\Http\Controllers;

use ActivoFijo\Http\Requests;
use ActivoFijo\Http\Controllers\Controller;

use Illuminate\Http\Request;


//modelo para empleado
use ActivoFijo\Empleado;
//modelo para oficina
use ActivoFijo\Oficina;

//Request Validator
use ActivoFijo\Http\Requests\Empleados;

class EmpleadosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $oficina=$request->get('IdOfna');
        $empleado=$request->get('IdEmp');
        $nombre=$request->get('DescEmp');
		$empleados = Empleado::ID($empleado)->nombre($nombre)->oficina($oficina)->paginate();
        $oficinas=array(''=>"-- Seleccione --")+Oficina::lists('DescOfna', 'IdOfna');
		return view('empleados/index', compact('empleados','oficinas','empleado','oficina','nombre'));
		//return view('empleados/index')->with('empleados',Empleado::all());
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$oficinas = Oficina::all();
		return view('empleados.create', compact('oficinas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Empleados $emp)
	{
		 //Se guardan los valores nuevos
        $o= new Empleado();
        $o->IdEmp=$emp->input('IdEmp');
        $o->DescEmp=$emp->input('DescEmp');
        $o->IdOfna=$emp->input('oficina');
        $o->save();

    	//se notifica
    	flash()->success('Se ha registrado correctamente.');
        return redirect()->route('empleados.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
  public function show($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit($id)
    {
        $post = Empleado::find($id);
        $oficinas = Oficina::all()->lists('DescOfna','IdOfna');

        return view('empleados.edit', compact('post','oficinas'));
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    
    public function update(Empleados $emp)
    {
        //$o = Oficina::find();        
        $input = array_except($emp->Input(),array('_token','_method','IdEmp'));
        Empleado::where('IdEmp',$emp->input('IdEmp'))->update($input);

        flash()->success('Se ha guardado los cambios correctamente.');
        return redirect()->route('empleados.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Oficina::destroy($id);

        //return Redirect::route('empleados.index');

        $o = Empleado::findOrFail($id);

        $o->delete();

        flash()->success('Se ha eleminado correctamente el empleado.');
        return redirect()->route('empleados.index');
    }

}

