@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> volver al listado</a>
	</div>
	<h1>Nuevo Activo {{ucfirst($tipo)}}</h1>	
</div>

@include('forms.errores')

{!!Form::model($activofijo,array('url' =>$tipo.'/activofijo'))!!}

@include('activofijo.forms',['txt_btn' => 'Guardar'])

@endsection

@section('script')
  <script src="{{ asset('/js/activo_create.js') }}"></script>
@stop