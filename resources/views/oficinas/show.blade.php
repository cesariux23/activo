@extends('app')
@section('content')
	<h1>{{$oficina->IdOfna}} -- {{$oficina->DescOfna}}</h1>
	<h3 class="text-muted">Listado de empleados</h3>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Bienes</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($empleados as $empleado)
				<tr>
					<td>{{$empleado->DescEmp}} </td>
					<td>{{$empleado->numeroBienes}}</td>
					<td>
						<a href="{{route('empleados.show',$empleado->IdEmp)}}" class="btn btn-default"> Ver listado de bienes</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop