{!! Form::open(array('route' => array('tipoadquisiciones.destroy', $tipa->IdTipAdq), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/tipoadquisiciones/'.$tipa->IdTipAdq.'/edit') }}"> Editar</a>
    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
{!! Form::close() !!}