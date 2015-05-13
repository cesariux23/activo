@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/empleados/create') }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Empleados</h1>	
</div>
<<<<<<< HEAD

=======
>>>>>>> 6d39c7245e43b2804b83dc80c2da452c1e41a2c2
<div class="well">
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
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
			@if (isset($nombre)||isset($oficina)||isset($empleado))
				{{-- true expr --}}
				<a href="{{ route('empleados.index') }}" class="btn btn-warning"><span class="glyphicon glyphicon-remove">
				</span> Limpiar</a>
			@endif
	{!! Form::close() !!}
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
