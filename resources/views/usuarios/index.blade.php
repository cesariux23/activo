@extends('app')

@section('content')
<div>
	<div class="pull-right hidden-print">
		<a  href="" class="btn btn-primary" ng-click="buscar=true" ng-show="!buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> <%txtBuscar? txtBuscar: 'Buscar'%></a>
		<a  href="" class="btn btn-default" ng-click="buscar=false" ng-show="buscar">
			<span class="fa fa-times text-danger"></span> Cerrar panel</a>

			<a  href="{{ url('/usuarios/create') }}" class="btn btn-success" ng-show="!buscar" title="Nuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
		</div>
		<h1>Listado de Usuarios</h1>
		<hr>

		<div class="well hidden-print" ng-show="buscar">
			{!! Form::model(Request::all(),array('route' =>'usuarios.index', 'method' => 'GET','class' => 'form-inline')) !!}
				<div>
					<div class="form-group">
						{!!Form::text('NombreUsr', null, ['class'=>'form-control','placeholder'=>'Nombre de Usuario'])!!}
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>	
	</div>

	<table class="table table-bordered">
		<thead class="well">
			<tr>
				<th width="600px">Nombre Usuario</th>
				<th width="400px">Llave</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $u)
			<tr>
				<td>{{$u->NombreUsr}}</td>
				<td>{{$u->password}}</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	@endsection
