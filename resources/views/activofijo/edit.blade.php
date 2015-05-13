@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Actualizar Movimientos <b>{{$post->Movto}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'ActivoFijoController@update', 'method' => 'put'))!!}

{!!Form::hidden('Movto')!!}

@include('activofijo.forms',['txt_btn' => 'Guardar cambios'])

@endsection