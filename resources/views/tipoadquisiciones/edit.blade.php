@extends('app')

@section('content')
<div>
	<div class="pull-right">
<<<<<<< HEAD
		<a  href="{{ url('/tipoadquisiciones') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
=======
		<a  href="{{ url('/tipoadquisiciones') }}" class="btn btn-info" title="Hola"> volver al listado</a>
>>>>>>> 6d39c7245e43b2804b83dc80c2da452c1e41a2c2
	</div>
	<h1>Actualizar Tipo de Adquisicion <b>{{$post->IdTipAdq}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'TipoAdquisicionController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdTipAdq')!!}

@include('tipoadquisiciones.form',['txt_btn' => 'Guardar cambios'])

@endsection