<!--si el formulario contiene errores de validación-->
@if($errors->has())
<div class='alert alert-danger'>
	<p>Verifique la siguente información:</p><br>
	<!--recorremos los errores en un loop y los mostramos-->
	<ul>
	@foreach ($errors->all('<p>:message</p>') as $message)
	<li>{!! $message !!}</li>
	@endforeach
	</ul>
</div>
@endif