@extends('app')
@section('content')
	<h1>{{$oficina->IdOfna}} -- {{$oficina->DescOfna}}</h1>
	<h3 class="text-muted">Listado de bienes</h3>

	@include('activofijo.tablabienes',['activofijo'=>$oficina->movimientos,'oficina'=>true]);
@stop
