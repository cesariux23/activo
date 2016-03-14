@extends('app')

@section('content')
	<div>
		<div class="pull-right">
			<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
			<a  href="{{ url('/'.$tipo.'/activofijo/'.$activofijo->Movto) }}" class="btn btn-default"><i class="fa fa-list"></i> Ir al historial de movimientos</a>
		</div>
		<h1><b>{{$activofijo->numeroinventario}}</b></h1>
	</div>
	<h3>Actualización de la información</h3>

	@include('forms.errores')

	{!!Form::model($activofijo,array('url' => $tipo.'/activofijo/'.$activofijo->Movto, 'method' => 'put'))!!}

	{!!Form::hidden('Movto')!!}

	@include('activofijo.forms')

	@include('forms.botones',['txt_btn' => 'Guardar cambios', 'path'=>'activofijo'])

@endsection
