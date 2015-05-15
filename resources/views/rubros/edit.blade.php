@extends('app')

@section('content')
<div>
	<div class="pull-right">

		<a  href="{{ url('/rubros') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>

	</div>
	<h1>Actualizar Rubros <b>{{$post->IdRub}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'RubrosController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdRub')!!}

@include('rubros.forms',['txt_btn' => 'Guardar cambios'])

@endsection