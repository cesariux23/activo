@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/tipoadquisiciones') }}" class="btn btn-info" title="Hola"> volver al listado</a>
	</div>
	<h1>Actualizar Tipo de Adquisicion <b>{{$post->IdTipAdq}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'TipoAdquisicionController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdTipAdq')!!}

@include('tipoadquisiciones.form',['txt_btn' => 'Guardar cambios'])

@endsection