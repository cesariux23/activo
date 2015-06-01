@extends('app')
@section('content')
	<h1>{{$oficina->IdOfna}} -- {{$oficina->DescOfna}}</h1>
	<h3 class="text-muted">Listado de bienes</h3>

	<table class="table table-bordered table-striped">
		<thead> 
			<tr>
				<th width="250px">Número Inventario</th>
				<th>Descripción del Artículo</th>

				<th>Tipo de Adquisición</th>

				<th>Rubro</th>

				<th width="100px">Estado</th>

				<th width="180px">Acciones</th>
			</tr>
		</thead>
		@foreach($oficina->bienes as $o)
		<tr>
			<td>
				<b>{{$o->bien->numeroInventario}}</b>
				<br>
				<span class="text-muted">{{$o->bien->Denomin}}</span>
			</td>
			<td>{{$o->bien->DescArt}}</td>

			<td>{{$o->bien->IdTipAdq}}</td>

			<td>{{$o->bien->IdRub}}</td>

			<td>{{$o->bien->Edo}}</td>
			<td>@include('activofijo.acciones',['tipo'=>strtolower($o->bien->tipob)])</td>
		</tr>
		@endforeach
	</table>
@stop