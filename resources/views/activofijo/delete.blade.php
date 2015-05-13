{!! Form::open(array('route' => array('activofijos.destroy', $o->Movto), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/ActivoFijos/'.$o->Movto.'/edit') }}"> Editar</a>
    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
{!! Form::close() !!}
