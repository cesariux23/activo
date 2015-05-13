@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url($urlCreate) }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	
	<h1>Listado de Activo {{ucfirst($tipo)}}</h1>	

	<div class="well">
	
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Clave o Número de Inventario">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
					</span>
				</div>
			</div>
		</div>
	</div>	
</div>

<table class="table table-bordered table-striped">
	<thead> 
		<tr>
			<th width="180px">Número Inventario</th>
			<th>Denominación</th>
			<th>Descripción del Artículo</th>

			<th>Id Tipo de Adquisición</th>


			<th>Id Rubro</th>


			<th>Estado</th>
			<th>Localización</th>

			
			<th width="150px">Acciones</th>
		</tr>
	</thead>

	@foreach($activoestatal as $o)
	<tr>
		<td>{{$o->numeroInventario}}</td>
		
		<td>{{$o->Denomin}}</td>
		<td>{{$o->DescArt}}</td>

		<td>{{$o->IdTipAdq}}</td>

		<td>{{$o->IdRub}}</td>

		<td>{{$o->Edo}}</td>
		<td>{{$o->Localiz}}</td>

		<td>@include('activofijo.acciones')</td>
	</tr>
	@endforeach
</table>

{!! $activoestatal->render() !!}
@endsection
