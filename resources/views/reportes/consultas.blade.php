@extends('app')
@section('content')
<div>	
	<div class="pull-right">
		<a  href="" class="btn btn-info" ng-show="!buscar"  title="Imprimir"> <span class="glyphicon glyphicon-print"></span> Imprimir</a>

		

		<a  href="" class="btn btn-default" ng-show="!buscar"  title="Exportar"> <span class="fa fa-cloud-download text-success"></span> Exportar..</a>
	</div>
	
	<h1>Relacion de Bienes Activo Fijo</h1>
</div>
<hr>

<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Movimientos</div>
	<div class="panel-body">
		<!-- Table -->
		<div class="row">
			<div class="col-md-2">
				<label>Recursos</label>
				{!!Form::select('TpoBien',['1.FEDERAL'=>'1.Federal','2.ESTATAL'=>'2.Estatal',],null,['class'=>'form-control'])!!}
			</div>
			<div class="col-md-2">
				<label>Año P.</label>
				{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
			</div>
			<div class="col-md-2">
				<label> ¿BAJAS?	<input type="checkbox" value="  ">  </label>
			</div>
			<div class="col-md-2">
				<label>Estado del Bien</label>
				{!!Form::select('Edo',config('opciones.estados'),null,['class'=>'form-control','ng-model'=>"bien.Edo",'ng-change'=>"temp.EdoDelBien=bien.Edo; detalle.EdoDelBien=bien.Edo"])!!}
			</div>
			<div class="col-md-1">
				<label> TOTAL	<input type="checkbox" value="  ">  </label>
			</div>
			<div class="col-md-2">
				<label> SOLO LOCALIZADOS	<input type="checkbox" value="  ">  </label>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<label>Denominación</label>
				<select name="IdProv" id="idrub" class="form-control" ng-model="bien.IdRub">
					<option value="">--Seleccione--</option>
					@foreach ($rubro as $rub)
					<option value="{{$rub->IdRub }}">{{$rub->IdRub." - -".$rub->DescRub}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-5">
				<label>¿Elegir Movimientos?</label><br>

				<label class="radio-inline">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio1"> TOTAL
				</label>

				<label class="radio-inline">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N"> Solo Localizados
				</label>

				<label class="radio-inline">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N"> Solo NO Localizados
				</label>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Empleado</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label>Clave</label>
							{!!Form::text('detalle[IdEmp]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta", 'id'=>"idemp"))!!}
						</div>
						<div class="col-md-8">
							<label>Nombre Usuario</label>
							{!!Form::select('detalle[IdEmp]',$empleados,null,array("class"=>"form-control",'id'=>"descemp")) !!}
							<br>
							<span id="departamento"></span>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Ubicación Física del Bien</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label>Ubicación</label>
							{!!Form::text('detalle[Ubicac]', null, array("class"=>"form-control","placeholder"=>"Id", 'id'=>"idubicacion"))!!}
						</div>
						<div class="col-md-8">
							<label>Edificio</label>
							<select id="ubicacion" class="form-control">
								<option value="">--Seleccione--</option>
								@foreach ($oficinas as $of)	
								<option value="{{$of->IdOfna }}">{{ $of->IdOfna." -- ".$of->DescOfna }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Proveedor</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label>Id Proveedor</label>
							{!!Form::text('detalle[IdProv]', null, array("class"=>"form-control","placeholder"=>"Id", 'id'=>"idprov"))!!}
							<!--<input type="text" id="idrub" class="form-control" placeholder="Id" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">-->
						</div>
						<div class="col-md-8">
							<label>Proveedor</label>
							<select name="IdProv" id="idprov" class="form-control">
								<option value="">--Seleccione--</option>
								@foreach ($proveedores as $prov)
								<option value="{{$prov->IdProv }}">{{ $prov->IdProv." -- ".$prov->DescProv}}</option>
								@endforeach
							</select>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Rubro</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label>Id Rubro</label>
							{!!Form::text('detalle[IdRub]', null, array("class"=>"form-control","placeholder"=>"Id", 'id'=>"idrubro"))!!}
							<!--<input type="text" id="idrub" class="form-control" placeholder="Id" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">-->
						</div>
						<div class="col-md-8">
							<label>Rubro</label>
							<select name="IdRub" id="rubdesc" class="form-control">
								<option value="">--Seleccione--</option>
								@foreach ($rubro as $rubdesc)	
								<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Rango de Fechas de Alta</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="form-group">
					<div class="col-md-4">
						<label for="inputEmail3" class="control-label">Fecha Inicial</label>
						<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							<input class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<input type="hidden" id="dtp_input2" value="" />
						</div>
						<div class="col-md-4 col-md-offset-4">
							<label for="inputEmail3" class="control-label">Fecha Final</label>
							<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span></span>
								</div>
								<input type="hidden" id="dtp_input2" value="">
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

			<br>
			<td>
				<button type="button" class="btn btn-info"  id="btnCambiar"><i class="fa fa-refresh"></i> Exportar a Excel</button>
			</td>
			@stop

			@section('script')
			@parent
			<script type="text/javascript">
				var oficinas={!! json_encode($oficinasemp) !!}
			</script>
			<script src="{{ asset('/js/activo_modal.js') }}"></script>
			<script src="{{ asset('/js/activo_create.js') }}"></script>
			@endsection	
