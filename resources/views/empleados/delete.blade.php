{!! Form::open(array('route' => array('empleados.destroy', $e->IdEmp), 'method' => 'DELETE')) !!}
	<a class="btn btn-sm btn-info" href="{{ url('/empleados/'.$e->IdEmp.'/edit') }}"> Editar</a>
	@if ($e->numeroBienes==0)
		{{-- Se puede borrar el registro pues no tiene bienes asignados --}}
		<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@else
		<a class="btn btn-sm btn-default" href="{{ url('/empleados/'.$e->IdEmp) }}"> Detalle</a>
	@endif
    
{!! Form::close() !!}
