@extends('app')

@section('content')
<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> Regresar</a>
	</div>
	<h1>Nuevo Activo {{ucfirst($tipo)}}</h1>	
</div>

@include('forms.errores')

{{$activofijo->detalle}}
{!!Form::model($activofijo,array('url' =>$tipo.'/activofijo'))!!}


@include('activofijo.forms')
@include('activofijo.tablaresponsable',['detalles'=>$detalles, 'nuevo'=>true])
@include('activofijo.modal')
@include('forms.botones',['txt_btn' => 'Guardar', 'path'=>'activofijo'])
@endsection

@section('script')
<script type="text/javascript">
	var detalle={!! json_encode($activofijo->detalle) !!};
	console.log(detalle)
</script>
 <script src="{{ asset('/js/activo_create.js') }}">  </script>
@stop