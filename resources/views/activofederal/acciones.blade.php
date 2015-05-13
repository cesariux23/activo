{!! Form::open(array('route' => array('activofederal.destroy', $o->Clave), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/activofederal/'.$o->Clave.'/edit') }}"> Editar</a>
	@if($o->Clave)
		<a class="btn btn-sm btn-default" href="{{ url('/activofederal/'.$o->Clave) }}"> Detalles</a>
			<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@else
		<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@endif
{!! Form::close() !!}
