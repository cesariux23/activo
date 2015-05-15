@extends('app')
@section('content')


<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> Regresar</a>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-modal-lg"><i class="fa fa-plus"></i> Nuevo movimiento</button>
	</div>
	<h1>{{$bien->numeroInventario}}</h1>
</div>

Datos del bien 

@include('activofijo.tablaresponsable',['detalles'=>$bien->detalles])
@include('activofijo.modal')

@stop