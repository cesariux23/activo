@extends('app')

@section('content')
<div>
	<div class="pull-right hidden-print">
		<a  href="" class="btn btn-primary" ng-click="buscar=true" ng-show="!buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> <%txtBuscar? txtBuscar: 'Buscar'%></a>
		<a  href="" class="btn btn-default" ng-click="buscar=false" ng-show="buscar">
			<span class="fa fa-times text-danger"></span> Cerrar panel</a>
		<a href="{{ route($tipo.'.activofijo.index') }}" class="btn btn-default" ng-show="txtBuscar">
			<span class="fa fa-trash text-info "></span> Limpiar
			</a>
			
		<a  href="{{url('imprime').'?'.'tipo='.$t.'&'.http_build_query(Request::all())}}" class="btn btn-info" ng-show="!buscar"  title="Imprimir" target="_blank"> <span class="glyphicon glyphicon-print"></span> Imprimir</a>
		<a  href="" class="btn btn-default" ng-show="!buscar"  title="Exportar"> <span class="fa fa-cloud-download text-success"></span> Exportar..</a>
		<a  href="{{ url($urlCreate) }}" class="btn btn-success" ng-show="!buscar"> <span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Activo {{ucfirst($tipo)}}</h1>
	@if ($baja>0)
		<h3 class="text-danger">Bajas {{$baja==2?'definitivas':''}}</h3>
	@endif
</div>
<hr>

<div class="well hidden-print" ng-show="buscar">
	{!! Form::model(Request::all(),array('route' => $tipo.'.activofijo.index', 'method' => 'GET','class' => 'form-inline')) !!}

	<div>
		<div class="form-group">
			{!!Form::text('Clave', null, ['class'=>'form-control','placeholder'=>'Clave'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('NumInv', null, ['class'=>'form-control','placeholder'=>'Número de Inventario'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('desc', null, ['class'=>'form-control','placeholder'=>'Descripción'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('DescEmp', null, ['class'=>'form-control','placeholder'=>'Nombre Empleado'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('DescOfna', null, ['class'=>'form-control','placeholder'=>'Ubicación'])!!}
		</div>
	</div>
	<br>
	<div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
	</div>
		{!! Form::close() !!}
	</div>
	@if (isset($clave)||isset($numinv)||isset($descemp)||isset($descofna))
	<span ng-init="txtBuscar='Modificar busqueda';"></span>
	@if ($activofijo->total()>0)

	<div class="alert alert-info">
		<h3>Resultados</h3>
		<b>{{$activofijo->total()}}</b> activo(s) encontrados.
	</div>
	@else
	<div class="alert alert-warning">
		<h3>Resultados</h3>
		No se encontraron resultados.
	</div>
	@endif
	@else
	<p><b>{{$activofijo->total()}}</b> activo(s) en total.</p>
	@endif

	@if($activofijo->total()>0)
	@include('activofijo.tablabienes');

	{!! $activofijo->appends(Request::only('Clave','NumInv','desc'))->render() !!}
	@endif

	@endsection
