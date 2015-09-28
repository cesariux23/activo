@extends('app')

@section('content')
<div>
	<div class="pull-right">
			<a  href="{{ url('/usuarios/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
	</div>
	<h1>Listado de Usuarios</h1>

	<div class="well">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nombre Usuario">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Buscar</button>
						</span>
				</div>
			</div>
		</div>
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
