{!! Form::open(array('route' => array($tipo.'.activofijo.destroy', $o->Movto), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info btn-sm" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto.'/edit') }}"> Editar</a>
	<a class="btn btn-sm btn-default btn-sm" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto) }}"> Movimentos</a>
	<button type="submit" class="btn btn-danger btn-sm">Baja</button>
{!! Form::close() !!}

