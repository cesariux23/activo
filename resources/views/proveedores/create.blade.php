@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/proveedores') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Nuevo Proveedor</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'ProveedoresController@store'))!!}

<div class="form-group">
	<label>Número de Proveedor</label>
	{!!Form::text('IdProv', old('IdProv'), array("class"=>"form-control","placeholder"=>"Número de Proveedor"))!!}
</div>

@include('proveedores.forms',['txt_btn' => 'Guardar'])

@stop