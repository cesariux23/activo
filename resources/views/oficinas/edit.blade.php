@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/adscripciones') }}" class="btn btn-info" title="Hola"> volver al listado</a>
	</div>
	<h1>Actualizar Adscripción <b>{{$post->IdOfna}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'OficinasController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdOfna')!!}

@include('oficinas.form',['txt_btn' => 'Guardar cambios'])

@endsection