@extends('app')

@section('content')
<div>
<<<<<<< HEAD
	<div class="pull-right">
		<a  href="{{ url('/proveedores/create') }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Proveedores</h1>	

	<div class="well">
=======
	<h1>Listado de Proveedores</h1>	

	<div class="well">
		<div class="pull-right">
			<a  href="{{ url('/proveedores/create') }}" class="btn btn-primary"> Nuevo</a>
		</div>
>>>>>>> 6d39c7245e43b2804b83dc80c2da452c1e41a2c2
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nombre Proveedor">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Buscar</button>
						</span>
				</div>
			</div>
		</div>
	</div>	
</div>

<table class="table table-bordered">
	<thead  class="well">
		<tr>
			<th>Id</th>
			<th>Proveedor</th>

			<th width="200px">Acciones</th>
		</tr>
	</thead>

	@foreach($proveedores as $o)
		<tr>
			<td>{{$o->IdProv}}</td>
			<td>{{$o->DescProv}}</td>
			
			<td>	
				@include('proveedores.delete')
			</td>
		</tr>
	@endforeach
</table>
{!! $proveedores->render() !!}
@endsection