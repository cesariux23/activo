@extends('app')
@section('content')
<h1>Bienes del empleado -- {{$post->DescEmp}}</h1>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Nombre del Bien</th>
			<th>Ubicación</th>
			<th>Estado</th>
			<th>Acciones</th>
			<th width="150px">Acciones</th>

		</tr>
	</thead>
	@foreach($movimientos as $mov)
	<tr>
		<td>{{$mov->Movto}}</td>
		<td>{{$mov->Ubicac}}</td>
		<td>{{$mov->EdoDelBien}}</td>
		<td>{{$mov->Acciones}}</td>
		<td>
			@if ($o->numeroEmpleados>0)
			<a href="{{ route('empleados.index').'?IdOfna='.$o->IdOfna}}">{{$o->numeroEmpleados}}</a>
			@else 
			0
			@endif
		</td>
		<td>
			@if ($o->numeroBienes>0)
			<a href="{{ route('empleados.index').'?IdOfna='.$o->IdOfna}}">{{$o->numeroBienes}}</a>
			@else 
			0
			@endif
		</td>
		<td>				
			@include('oficinas.acciones')
		</td>
	</tr>
	@endforeach
</table>

@stop