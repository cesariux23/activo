@extends('app')
@section('content')

<div>
	<div class="pull-right hidden-print">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Regresar</a>
		<a href="{{ route('vales.show',$bien->Movto) }}" class="btn btn-primary" target="blanck_"><i class="fa fa-newspaper-o"></i> Vale de resguardo</a>
		<a href="{{ route('codigos.show',$bien->Movto) }}" class="btn btn-default" target="blanck_"><i class="fa fa-qrcode text-success"></i> QR</a>
		<button type="button" class="btn btn-default" click="window.print();"><i class="fa fa-print"></i> Imprimir</button>
	</div>
	<h1>{{$bien->numeroInventario}}</h1>
</div>

<legend>
	<div class="pull-right">
		<a class="btn btn-warning" href="{{ url('/'.$tipo.'/activofijo/'.$bien->Movto.'/edit') }}" title="Editar información del bien"><i class="fa fa-edit"></i> Editar</a>
	</div>
	Recurso {{ucfirst($tipo)}}
</legend>
<div class="row">
	<div class="col-xs-1">
		<label><b>Grupo</b></label>
		<p>{{$bien->Gpo}}</p>
	</div>
	<div class="col-xs-2">
		<label> <b>Clave</b></label>
		<p>{{$bien->Clave}}</p>
	</div>
	<div class="col-xs-2">
		<label> <b>Número Inv.</b></label>
		<p>{{$bien->NumInv}}</p>
	</div>
	<div class="col-xs-1">
		<label> <b>Año P.</b></label>
		<p>{{$bien->AnoPrg}}</p>
	</div>
	<div class="col-xs-1">
		<label> <b>Tipo</b></label>
		<p>{{$bien->TpoBien}}</p>
	</div>
	<div class="col-xs-3">
		<label> <b>Denominación</b></label>
		<p>{{$bien->Denomin}}</p>
	</div>
	<div class="col-xs-2">
		<label> <b>Fecha Alta</b></label>
		<p>{{$bien->FecAlta}}</p>
	</div>
</div>

<div class="form-group">
	<label><b>Descripción del Artículo</b></label>
	<p>{{$bien->DescArt}}</p>
</div>
<div class="row">
	<div class="col-xs-3">
		<b>Estado del bien</b>
		<p>{{$bien->Edo}}</p>
	</div>
	<div class="col-xs-3">
		<b>Bien localizado</b>
		<p>{{$bien->Localiz == "S" ? "Sí" : "No"}}</p>
	</div>
</div>

@include('activofijo.tablaresponsable',['detalles'=>$bien->detalles])

{!!Form::open(array('action' => 'MovimientosController@store'))!!}
{!!form::hidden('tipo',$tipo)!!}
{!!form::hidden('detalle[Movto]',$bien->Movto)!!}
@include('activofijo.modal',array('guardar'=>true))
{!!Form::close()!!}

@stop

@section('scripts')
@parent
	<script src="{{ asset('/js/activo_create.js') }}"></script>
@endsection
