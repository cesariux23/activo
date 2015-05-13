@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Nuevo Activo {{ucfirst($tipo)}}</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('url' =>$tipo.'/activofijo'))!!}

<fieldset>
  <legend>Recurso {{ucfirst($tipo)}}</legend> 
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
  </fieldset>

@include('activofijo.forms',['txt_btn' => 'Guardar'])

@endsection

@section('script')
  <script src="{{ asset('/js/activo_create.js') }}"></script>
@stop