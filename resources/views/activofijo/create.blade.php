@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info" title="Regresar"><i class="fa fa-chevron-left"></i>  Regresar</a>
	</div>
	<h1>Nuevo Activo {{ucfirst($tipo)}}</h1>
</div>

@include('forms.errores')

{!!Form::model($activofijo,array('url' =>$tipo.'/activofijo'))!!}

<section ng-init='detalle={{$activofijo->detalle}};' ng-controller="createActivoController">
@include('activofijo.forms')
@include('activofijo.tablaresponsable',['detalles'=>$detalles, 'nuevo'=>true])
@include('activofijo.modal')
@include('forms.botones',['txt_btn' => 'Guardar', 'path'=>'activofijo'])
</section>

@endsection

@section('script')
 <script src="{{ asset('/js/activo_create.js') }}">  </script>
@stop
