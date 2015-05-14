@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/empleados') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Nuevo Empleado</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'EmpleadosController@store'))!!}

<div class="form-group">
	<label>Número de Empleado</label>
	{!!Form::text('IdEmp', old('IdEmp'), array("class"=>"form-control","placeholder"=>"Número de Empleado"))!!}
</div>

@include('empleados.forms',['txt_btn' => 'Guardar'])

@endsection