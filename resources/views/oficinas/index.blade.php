@extends('app')

@section('content')
<div>	
	<div class="pull-right">
		<a  href="{{ url('/adscripciones/create') }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus">	</span> Nuevo</a>
	</div>
	<h1>Listado de Adscripciones</h1>	

	<div class="well">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nombre Adscripción">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" type="button">Buscar</button>
					</span>
				</div>
			</div>
		</div>
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
