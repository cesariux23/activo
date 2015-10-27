@extends('app')
@section('content')

<div>
	<div class="pull-right hidden-print">
		<a  href="" class="btn btn-primary" ng-click="buscar=true" ng-show="!buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> <%txtBuscar? txtBuscar: 'Buscar'%></a>
		<a  href="" class="btn btn-default" ng-click="buscar=false" ng-show="buscar">
			<span class="fa fa-times text-danger"></span> Cerrar panel</a>
		<a href="{{ route('empleados.index') }}" class="btn btn-warning" ng-show="txtBuscar">
			<span class="glyphicon glyphicon-remove"></span> Limpiar</a>
		<a  href="{{ url('/empleados/create') }}" class="btn btn-success" ng-show="!buscar" title="Nuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
		<h1>Listado de Empleados</h1>	
			<hr>

			<div class="well hidden-print" ng-show="buscar">
				{!! Form::model(Request::all(),array('route' => 'empleados.index', 'method' => 'GET','class' => 'form-inline')) !!}
				<div class="form-group">
					{!!Form::text('IdEmp', null, ['class'=>'form-control','placeholder'=>'ID'])!!}
				</div>
				<div class="form-group">
					{!!Form::text('DescEmp', null, ['class'=>'form-control','placeholder'=>'Nombre'])!!}
				</div>
				<div class="form-group">
					{!!Form::select('IdOfna', $oficinas, null, array("class"=>"form-control" ))!!}
				</div>
				<button type="submit" class="btn btn-primary" title="Buscar"><span class="glyphicon glyphicon-search" title="Buscar"></span> Buscar</button>
					@if (isset($nombre)||isset($oficina)||isset($empleado))
						<span ng-init="txtBuscar='Modificar busqueda';"></span>
					@endif
				{!! Form::close() !!}
			</div>
		</div>

		<p><b>{{$empleados->total()}}</b> empleado(s).</p>
		<table class="table table-bordered">
			<thead class="well">
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Adscripción</th>
					<th>Numero de bienes</th>

					<th width="200px">Acciones</th>
				</tr>
			</thead>
			@foreach($empleados as $e)
			<tr>
				<td>{{$e->IdEmp}}</td>
				<td>{{$e->DescEmp}}</td>
				<?php $of=$e->oficina;?>
				@if(isset( $of))
				<td>{{$e->oficina->DescOfna}}</td>
				@else
				<td>Sin Registro</td>
				@endif
				<td>{{$e->numeroBienes}}</td>
				<td>	
					@include('empleados.delete')
				</td>
			</tr>
			@endforeach
		</table>
		{!! $empleados->appends(array('DescEmp'=>$nombre,'IdOfna'=>$oficina,'IdEmp'=>$empleado))->render() !!}
		@endsection
