{!! Form::open(array('route' => array('activofijo.destroy', $o->Movto), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto.'/edit') }}"> Editar</a>
	@if($o->numeroEmpleados)
		<a class="btn btn-sm btn-default" href="{{ url('/'.$tipo.'/activofijo/'.$o->Movto) }}"> Detalles</a>
	@else
		<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@endif
{!! Form::close() !!}