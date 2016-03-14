@extends('app')
@section('content')
<div>
	<div class="pull-right hidden-print">
		<a  href="{{ url('/adscripciones') }}" class="btn btn-info" title="Regresar"> Regresar</a>
		<button type="button" class="btn btn-default" click="window.print();"  title="Imprimir"><i class="fa fa-print"></i> Imprimir</button>
	</div>
	<h1>{{$oficina->IdOfna}} -- {{$oficina->DescOfna}}</h1>
</div>
<hr>
<h3 class="text-muted">Listado de bienes</h3>
@include('activofijo.tablabienes',['activofijo'=>$oficina->movimientos,'oficina'=>true,'costoTotal'=>$costo]);
@stop
