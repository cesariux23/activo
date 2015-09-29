@extends('app')

@section('content')
<div>
	<div class="pull-right hidden-print">
		<a  href="" class="btn btn-primary" ng-click="buscar=true" ng-show="!buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> <%txtBuscar? txtBuscar: 'Buscar'%></a>
		<a  href="" class="btn btn-default" ng-click="buscar=false" ng-show="buscar">
			<span class="fa fa-times text-danger"></span> Cerrar panel</a>
		<a href="{{ route('adscripciones.index') }}" class="btn btn-warning" ng-show="txtBuscar">
		<span class="glyphicon glyphicon-remove"></span> Limpiar</a>
		<a  href="{{ url('/adscripciones/create') }}" class="btn btn-success" ng-show="!buscar" title="Nuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Adscripciones</h1>
	<hr>

	<div class="well hidden-print" ng-show="buscar">
		{!! Form::model(Request::all(),array('route' => 'adscripciones.index', 'method' => 'GET','class' => 'form-inline')) !!}
		
		<div class="form-group">
			{!!Form::text('IdOfna', null, ['class'=>'form-control','placeholder'=>'ID'])!!}
		</div>

		<div class="form-group">
			{!!Form::text('DescOfna', null, ['class'=>'form-control','placeholder'=>'Adscripción'])!!}
		</div>

		<button type="submit" class="btn btn-primary" title="Buscar"><span class="glyphicon glyphicon-search"></span> Buscar</button>
		@if (isset($oficina)||isset($nombre))
			<span ng-init="txtBuscar='Modificar busqueda';"></span>
		
		@endif
		{!! Form::close() !!}
	</div>
</div>

	<table class="table table-bordered">
		<thead class="well">
			<tr>
				<th>Id</th>
				<th>Adscripción</th>
				<th>Dirección</th>
				<th>Empleados Adscritos</th>
				<th>Núm. bienes</th>

				<th width="200px">Acciones</th>
			</tr>
		</thead>
		@foreach($oficinas as $o)
		<tr>
			<td>{{$o->IdOfna}}</td>
			<td>{{$o->DescOfna}}</td>
			<td>{{$o->DirOfna}}</td>
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
	{!! $oficinas->render()!!}
	@endsection
