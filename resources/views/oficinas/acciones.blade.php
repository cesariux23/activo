{!! Form::open(array('route' => array('adscripciones.destroy', $o->IdOfna), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/adscripciones/'.$o->IdOfna.'/edit') }}" title="Editar"> Editar</a>
	@if($o->numeroEmpleados || $o->numeroBienes)
		<a class="btn btn-sm btn-default" href="{{ url('/adscripciones/'.$o->IdOfna) }}" title="Detalles"> Detalles</a>
	@else		
		@if($o->totalmovimientos==0)
		<button type="submit" class="btn btn-danger btn-sm" title="Borrar">Borrar</button>
		@endif
	@endif
{!! Form::close() !!}
