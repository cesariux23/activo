{!! Form::open(array('route' => array('proveedores.destroy', $o->IdProv), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/proveedores/'.$o->IdProv.'/edit') }}"> Editar</a>
	<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
{!! Form::close() !!}
