@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/tipoadquisiciones') }}" class="btn btn-info" title="Hola"> Regresar</a>
	</div>
	<h1>Nuevo Tipo de Adquisiciones</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'TipoAdquisicionController@store'))!!}

<div class="form-group">
	<label>Adquisición</label>
	{!!Form::text('IdTipAdq', old('IdTipAdq'), array("class"=>"form-control","placeholder"=>"Adquisicion"))!!}
</div>

@include('tipoadquisiciones.forms',['txt_btn' => 'Guardar'])

@endsection