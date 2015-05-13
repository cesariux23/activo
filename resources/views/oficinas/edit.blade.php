@extends('app')

@section('content')
<div>
	<div class="pull-right">
<<<<<<< HEAD
		<a  href="{{ url('/adscripciones') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
=======
		<a  href="{{ url('/adscripciones') }}" class="btn btn-info" title="Hola"> volver al listado</a>
>>>>>>> 6d39c7245e43b2804b83dc80c2da452c1e41a2c2
	</div>
	<h1>Actualizar Adscripción <b>{{$post->IdOfna}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'OficinasController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdOfna')!!}

@include('oficinas.form',['txt_btn' => 'Guardar cambios'])

@endsection