@extends('app')
@section('content')

<div>
	<div class="pull-right hidden-print">
		<a  href="" class="btn btn-primary" ng-click="buscar=true" ng-show="!buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> <%txtBuscar? txtBuscar: 'Buscar'%></a>
		<a  href="" class="btn btn-default" ng-click="buscar=false" ng-show="buscar">
			<span class="fa fa-times text-danger"></span> Cerrar panel</a>
		<a href="{{ route('proveedores.index') }}" class="btn btn-warning" ng-show="txtBuscar">
			<span class="glyphicon glyphicon-remove"></span> Limpiar</a>
		<a  href="{{ url('/proveedores/create') }}" class="btn btn-success" ng-show="!buscar" title="Nuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Proveedores</h1>	
	<hr>

	<div class="well hidden-print" ng-show="buscar">
		{!! Form::model(Request::all(),array('route' => 'proveedores.index', 'method' => 'GET','class' => 'form-inline')) !!}
		
		<div class="form-group">
			{!!Form::text('IdProv', null, ['class'=>'form-control','placeholder'=>'ID'])!!}
		</div>

		<div class="form-group">
			{!!Form::text('DescProv', null, ['class'=>'form-control','placeholder'=>'Proveedor'])!!}
		</div>

		<button type="submit" class="btn btn-primary" title="Buscar"><span class="glyphicon glyphicon-search" title="Buscar"></span> Buscar</button>
			@if (isset($proveedor)||isset($nombre))
				<span ng-init="txtBuscar='Modificar busqueda';"></span>
			@endif
		{!! Form::close() !!}
	</div>
</div>

<table class="table table-bordered">
	<thead  class="well">
		<tr>
			<th>Id</th>
			<th>Proveedor</th>

			<th width="200px">Acciones</th>
		</tr>
	</thead>

	@foreach($proveedores as $o)
		<tr>
			<td>{{$o->IdProv}}</td>
			<td>{{$o->DescProv}}</td>
			
			<td>	
				@include('proveedores.delete')
			</td>
		</tr>
	@endforeach
</table>
{!! $proveedores->render() !!}
@endsection