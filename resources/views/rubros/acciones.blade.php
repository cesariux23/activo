{!! Form::open(array('route' => array('rubros.destroy', $rub->IdRub), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/rubros/'.$rub->IdRub.'/edit') }}"> Editar</a>
    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
{!! Form::close() !!}

