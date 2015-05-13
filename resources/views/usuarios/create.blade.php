@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/usuarios') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Nuevo Usuario</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'UsuarioController@store'))!!}

<div class="form-group">
	<label>ID</label>
	{!!Form::text('Idtfcn', old('Idtfcn'), array("class"=>"form-control","placeholder"=>"Id Usuario","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

@include('usuarios.forms',['txt_btn' => 'Guardar Usuario'])

@stop