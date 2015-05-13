@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/activoestatal') }}" class="btn btn-info" title="Hola"> volver al listado</a>
	</div>
	<h1>Nuevo Activo Estatal</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'ActivoEstatalController@store'))!!}

<fieldset>
	<legend>Recursos Estatales:</legend> 
	<div class="row">
		<div class="col-md-2">
			<label>Grupo</label>
			{!!Form::text('Gpo', old('Gpo'), array("class"=>"form-control","placeholder"=>"Grupo"))!!}
		</div>
		<div class="col-md-2">
			<label>Clave</label>
			{!!Form::text('Clave', @$Clave, array("class"=>"form-control","placeholder"=>"Clave"))!!}
		</div>
		<div class="col-md-2">
			<label>Número Inv.</label>
			{!!Form::text('NumInv', @$NumInv, array("class"=>"form-control","placeholder"=>"# Inventario"))!!}
		</div>
		<div class="col-md-1">
			<label>Año P.</label>
			{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
		</div>
		<div class="col-md-1">
			<label>Tipo</label>
			{!!Form::text('TpoBien', @$TpoBien, array("class"=>"form-control","placeholder"=>"Tipo"))!!}
		</div>
		<div class="col-md-2">
			<label>Denominación</label>
			{!!Form::text('Denomin', @$Denomin, array("class"=>"form-control","placeholder"=>"Denominación"))!!}
		</div>
		<div class="col-md-2">
			<label>Fecha Alta</label>
			
			{!!Form::text('FecAlta', @$FecAlta, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
		</div>

	</fieldset><br>

	@include('activoestatal.forms',['txt_btn' => 'Guardar Empleado'])

	@endsection

	@section('scripts')
	<script src="{{ asset('/js/activo_create.js') }}"></script>
	@stop