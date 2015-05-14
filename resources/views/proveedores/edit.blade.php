@extends('app')

@section('content')
<div>
	<div class="pull-right">

		<a  href="{{ url('/proveedores') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>

	</div>
	<h1>Actualizar Proveedor <b>{{$post->IdProv}} -- {{$post->DescProv}}</b></h1>	
</div>

@include('forms.errores')

{!!Form::model($post,array('action' => 'ProveedoresController@update', 'method' => 'put'))!!}

{!!Form::hidden('IdProv')!!}

@include('proveedores.form',['txt_btn' => 'Guardar cambios'])

@endsection