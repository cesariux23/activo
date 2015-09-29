{!! Form::open(array('route' => array('empleados.destroy', $e->IdEmp), 'method' => 'DELETE')) !!}
	<input type="hidden" name="baja" id="baja{{$e->IdEmp}}" value="0">
	<a class="btn btn-sm btn-info" href="{{ url('/empleados/'.$e->IdEmp.'/edit') }}" title="Editar"> Editar</a>
	@if ($e->totalmovimientos==0)
		{{-- Se puede borrar el registro pues no tiene bienes asignados --}}
		<button type="submit" class="btn btn-danger btn-sm" title="Borrar"> Borrar</button>
	@else
		<a class="btn btn-sm btn-default" href="{{ url('/empleados/'.$e->IdEmp) }}" title="Detalle"> Detalle</a>
		@if($e->numeroBienes==0)
		<button type="submit" class="btn btn-warning btn-sm" onclick="$('#baja{{$e->IdEmp}}').val(1)" title="Baja"> Baja</button>
		@endif
	@endif
    
{!! Form::close() !!}
