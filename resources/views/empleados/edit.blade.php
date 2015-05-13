@extends('app')

@section('content')
<div>
	<div class="pull-right">
<<<<<<< HEAD
		<a  href="{{ url('/empleados') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
=======
		<a  href="{{ url('/empleados') }}" class="btn btn-info" title="Hola"> volver al listado</a>
>>>>>>> 6d39c7245e43b2804b83dc80c2da452c1e41a2c2
	</div>
	<h1>Actualizar Empleado </h1>		
</div>
<h4><b>{{$post->IdEmp}}</b> -- {{$post->DescEmp}}</h4>

@include('forms.errores')

{!!Form::model($post,array('action' => 'EmpleadosController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdEmp')!!}

@include('empleados.form',['txt_btn' => 'Guardar cambios'])

@endsection