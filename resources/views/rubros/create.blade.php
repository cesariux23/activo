@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/rubros') }}" class="btn btn-info" title="Hola"> Regresar</a>
	</div>
	<h1>Nuevo Rubro</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'RubrosController@store'))!!}

<div class="form-group">
	<label>Rubro</label>
	{!!Form::text('IdRub', old('IdRub'), array("class"=>"form-control","placeholder"=>"Rubro", "style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
</div>

@include('rubros.forms',['txt_btn' => 'Guardar Rubro'])

@endsection