{!! Form::open(array('route' => array('activofijo.destroy', $o->MovTo), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/activofijo/'.$o->MovTo.'/edit') }}"> Editar</a>
    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
{!! Form::close() !!}