@extends('app')

@section('content')
<div>
	<h1>Listado de Activo Federal</h1>	

	<div class="well">
		<div class="pull-right">
			<a  href="{{ url('/activofedral/create') }}" class="btn btn-primary"> Nuevo</a>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Clave o Número de Inventario">
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
			<th>Grupo</th>
			<th>Clave</th>
			<th>Número Inventario</th>
			<th>Año</th>
			<th>Tipo de Bien</th>
			<th>Denominación</th>
			<th>Fecha de Alta</th>
			<th>Descripción del Artículo</th>


			<th>Id Proveedor</th>
			<th>Número de Factura</th>
			<th>Fecha de Factura</th>
			<th>Costo</th>


			<th>Id Tipo de Adquisición</th>


			<th>Id Rubro</th>


			<th>Estado</th>
			<th>Localización</th>

			
			<th width="200px">Acciones</th>
		</tr>
	</thead>

	@foreach($activofederal as $o)
	<tr>
		<td>{{$o->Gpo}}</td>
		<td>{{$o->Clave}}</td>
		<td>{{$o->NumInv}}</td>
		<td>{{$o->AnoPrg}}</td>
		<td>{{$o->TpoBien}}</td>
		<td>{{$o->Denomin}}</td>
		<td>{{$o->FecAlta}}</td>
		<td>{{$o->DescArt}}</td>

		<td>		</td>
		<td>		</td>
		<td>		</td>
		<td>		</td>

		<td>		</td>

		<td>		</td>

		<td>		</td>
		<td>		</td>

		<td>@include('activofederal.acciones')</td>
	</tr>
	@endforeach
</table>
{!! $activofederal->render() !!}
@endsection
