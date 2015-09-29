@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/adscripciones') }}" class="btn btn-info" title="Regresar"><i class="fa fa-chevron-left"></i> Regresar</a>
	</div>
	<h1>Nueva Adscripción</h1>	
</div>

@include('forms.errores')

{!!Form::open(array('action' => 'OficinasController@store'))!!}

<div class="form-group">
	<label>ID</label>
	{!!Form::text('IdOfna', old('IdOfna'), array("class"=>"form-control","placeholder"=>"Identificador Único"))!!}

</div>

@include('oficinas.form',['txt_btn' => 'Guardar'])

@endsection
