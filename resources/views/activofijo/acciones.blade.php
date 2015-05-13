{!! Form::open(array('route' => array('activofijo.destroy', $o->Movto), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto.'/edit') }}"> Editar</a>
		<a class="btn btn-sm btn-default" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto) }}"> Detalles</a>
		<button type="submit" class="btn btn-danger btn-sm">Baja</button>
{!! Form::close() !!}