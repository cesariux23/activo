{!! Form::open(array('route' => array('empleados.destroy', $e->IdEmp), 'method' => 'DELETE')) !!}
	<input type="hidden" name="baja" id="baja{{$e->IdEmp}}" value="0">
	<a class="btn btn-sm btn-info" href="{{ url('/empleados/'.$e->IdEmp.'/edit') }}"> Editar</a>
	@if ($e->numeroBienes==0)
		{{-- Se puede borrar el registro pues no tiene bienes asignados --}}
		<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
	@else
		<a class="btn btn-sm btn-default" href="{{ url('/empleados/'.$e->IdEmp) }}"> Detalle</a>
		<button type="submit" class="btn btn-warning btn-sm" onclick="$('#baja{{$e->IdEmp}}').val(1)">Baja</button>
	@endif
    
{!! Form::close() !!}
