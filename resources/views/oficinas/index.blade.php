@extends('app')

@section('content')
<div>	
	<div class="pull-right">
		<a  href="{{ url('/adscripciones/create') }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus">	</span> Nuevo</a>
	</div>
	
	<h1>Listado de Adscripciones</h1>	
</div>
<div class="well">
		{!! Form::model(Request::all(),array('route' => 'adscripciones.index', 'method' => 'GET','class' => 'form-inline')) !!}
		
			<div class="form-group">
				{!!Form::text('IdOfna', null, ['class'=>'form-control','placeholder'=>'ID'])!!}
			</div>

			<div class="form-group">
				{!!Form::text('DescOfna', null, ['class'=>'form-control','placeholder'=>'Adscripción'])!!}
			</div>

			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
			@if (isset($oficina)||isset($nombre))
				{{-- true expr --}}
				<a href="{{ route('adscripciones.index') }}" class="btn btn-warning"><span class="glyphicon glyphicon-remove">
				</span> Limpiar</a>
			@endif
	{!! Form::close() !!}
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
