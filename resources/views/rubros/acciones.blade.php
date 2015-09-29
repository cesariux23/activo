{!! Form::open(array('route' => array('rubros.destroy', $rub->IdRub), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/rubros/'.$rub->IdRub.'/edit') }}" title="Editar"> Editar</a>
    <button type="submit" class="btn btn-danger btn-sm" title="Borrar">Borrar</button>
{!! Form::close() !!}



