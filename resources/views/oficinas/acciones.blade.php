{!! Form::open(array('route' => array('adscripciones.destroy', $o->IdOfna), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/adscripciones/'.$o->IdOfna.'/edit') }}"> Editar</a>
	@if($o->numeroEmpleados || $o->numeroBienes)
		<a class="btn btn-sm btn-default" href="{{ url('/adscripciones/'.$o->IdOfna) }}"> Detalles</a>
	@else
		<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@endif
{!! Form::close() !!}
