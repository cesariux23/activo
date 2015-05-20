@extends('app')
@section('content')


<div>
	<div class="pull-right">
		<a  href="{{ url('/'.$tipo.'/activofijo') }}" class="btn btn-info"> Regresar</a>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-modal-lg"><i class="fa fa-plus"></i> Nuevo movimiento</button>
	</div>
	<h1>{{$bien->numeroInventario}}</h1>
</div>

	<legend>Recurso {{ucfirst($tipo)}}</legend> 
	<div class="row">
		<div class="col-md-1">
			<label>Grupo</label>
			<p>{{$bien->Gpo}}</p>
		</div>
		<div class="col-md-2">
			<label>Clave</label>
			<p>{{$bien->Clave}}</p>
		</div>
		<div class="col-md-2">
			<label>Número Inv.</label>
			<p>{{$bien->NumInv}}</p>
		</div>
		<div class="col-md-1">
			<label>Año P.</label>
			<p>{{$bien->AnoPrg}}</p>
		</div>
		<div class="col-md-1">
			<label>Tipo</label>
			<p>{{$bien->TpoBien}}</p>
		</div>
		<div class="col-md-3">
			<label>Denominación</label>
			<p>{{$bien->Denomin}}</p>
		</div>
		<div class="col-md-2">
			<label>Fecha Alta</label>
			<p>{{$bien->FecAlta}}</p>
		</div>
	</div>

	<div class="form-group">
	<label>Descripción del Artículo:</label>
		<p>{{$bien->DescArt}}</p>
	</div>


@include('activofijo.tablaresponsable',['detalles'=>$bien->detalles])
@include('activofijo.modal')

@stop