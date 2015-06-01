@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="" class="btn btn-default"> <span class="glyphicon glyphicon-print"></span> Imprimir</a>
		<a  href="{{ url($urlCreate) }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Activo {{ucfirst($tipo)}}</h1>
</div>

<div class="well">
	{!! Form::model(Request::all(),array('route' => $tipo.'.activofijo.index', 'method' => 'GET','class' => 'form-inline')) !!}

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
		{!!Form::text('DescEmp', null, ['class'=>'form-control','placeholder'=>'Nombre'])!!}
	</div>
	<div class="form-group">
		{!!Form::text('DescOfna', null, ['class'=>'form-control','placeholder'=>'Ubicación'])!!}
	</div>


	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
	@if (isset($clave)||isset($numinv)||isset($descemp)||isset($descofna))
	{{-- true expr --}}
	<a href="{{ route($tipo.'.activofijo.index') }}" class="btn btn-warning">
		<span class="glyphicon glyphicon-remove"></span> Limpiar</a>
		@endif
		{!! Form::close() !!}
	</div>

	<p><b>{{$activoestatal->total()}}</b> activo(s).</p>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="250px">Número Inventario</th>
				<th>Descripción del Artículo</th>

				<th>Responsable / Ubicación </th>

				<th width="80px">Estado</th>

				<th width="180px">Acciones</th>
			</tr>
		</thead>

		@foreach($activoestatal as $o)
		<tr>
			<td>
				<b>{{$o->numeroInventario}}</b>
				<br>
				<span class="text-muted">{{$o->Denomin}}</span>
			</td>
			<td>{{$o->DescArt}}</td>

			<td>
				<b>{{$o->DescEmp}}</b>
				<br>
				<span class="text-muted">{{$o->DescOfna}}</span>
			</td>
			<td>{{$o->Edo}}</td>

			<td>@include('activofijo.acciones')</td>
		</tr>
		@endforeach
	</table>

	{!! $activoestatal->appends(Request::only('Clave','NumInv','desc'))->render() !!}
	@endsection
