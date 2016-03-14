@extends('app')
@section('content')
<div>	
	<div class="pull-right">
		<a  href="" class="btn btn-info" ng-show="!buscar"  title="Imprimir"> <span class="glyphicon glyphicon-print"></span> Imprimir</a>
		<a  href="" class="btn btn-default" ng-show="!buscar"  title="Exportar"> <span class="fa fa-cloud-download text-success"></span> Exportar..</a>
	</div>
	
	<h1>Reporte Filtrado</h1>
</div>
<hr>

<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Filtrado por Activo</div>
	<div class="panel-body">
		<!-- Table -->


</div>
@endsection