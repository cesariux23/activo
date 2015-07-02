@extends('app')
@section('content')
<h1>Exportación hacia Excel</h1>

	<div class="row">
		<div class="col-md-1">
			<label>Recursos</label>
			{!!Form::text('Gpo', old('Gpo'), array("class"=>"form-control","placeholder"=>"Grupo"))!!}
		</div>
		<div class="col-md-1">
			<label>Año P.</label>
			{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
		</div>
		<div class="col-md-4">
			<label>Denominación</label>
			{!!Form::text('Gpo', old('Gpo'), array("class"=>"form-control","placeholder"=>"Cualquier parte del campo"))!!}
		</div>
		<div class="col-md-1">
			<label>¿BAJA?</label>
			{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
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
	<div class="row">
		<div class="col-md-4">
							<label>Estado del Bien</label>
							{!!Form::select('FecAlta',['1.BUENO'=>'1.BUENO',
								'2.MALO'=>'2.MALO',
								'3.REGULAR'=>'3.REGULAR',
								'4.DESUSO' => '5.DESUSO',
								'5.EXTRAVIO' => '5.EXTRAVIO',
								'6.BAJA(INSERVIBLE)' => '6.BAJA(INSERVIBLE)',
								'7.BAJA(ROBO)' => '7.BAJA(ROBO)',
								'8.BAJA(TRANSFER)' => '8.BAJA(TRANSFER)',
								'9.BAJA(SINIESTRO)' => '9.BAJA(SINIESTRO)',
								'10.BAJA(RECLASIFIC)' => '10.BAJA(RECLASIFIC)'],null,['class'=>'form-control'])!!}
		</div>

		<div class="col-md-1">
			<label>Id</label>
			<input type="text" id="idadq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
		</div>
		<div class="col-md-3">
			<label>Adquisición</label>
			<select name="IdTipAdq" id="adq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">	
				<option value="">--Seleccione--</option>
				@foreach ($adquisicion as $adq)	
				<option value="{{$adq->IdTipAdq }}">{{ $adq->IdTipAdq." -- ".$adq->DescAdq }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-1">
			<label>Id Rubro</label>
			<input type="text" id="idrub" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
		</div>
		<div class="col-md-3">
			<label>Rubro</label>
			<select name="IdRub" id="rubdesc" class="form-control">
				<option value="">--Seleccione--</option>
				@foreach ($rubro as $rubdesc)	
				<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
				@endforeach
			</select>
		</div>


					
	</div>

	<div class="row">
		<div class="col-md-2">
			<label>Id</label>
			<input type="text" id="prov" class="form-control">
		</div>
		<div class="col-md-10">
			<label>Proveedor</label>
			<select name="IdProv" id="idprov" class="form-control">
				<option value="">--Seleccione--</option>
				@foreach ($proveedores as $prov)	
				<option value="{{$prov->IdProv }}">{{ $prov->IdProv." -- ".$prov->DescProv}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
							<label>Clave</label>
							{!!Form::text('detalle[IdEmp]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta", 'id'=>"idemp"))!!}
						</div>
						<div class="col-md-10">
							<label>Nombre Usuario</label>
							{!! Form::select('detalle[IdEmp]',$empleados,null,array("class"=>"form-control",'id'=>"descemp")) !!}
							<br>
							<span id="departamento"></span>
						</div>
	</div>
	<div class="row">
		<div class="col-md-2">
								<label>Ubicación</label>
								{!!Form::text('detalle[Ubicac]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta", 'id'=>"idubicacion"))!!}
							</div>
							<div class="col-md-10">
								<label>Edificio</label>
								<select id="ubicacion" class="form-control">
									<option value="">--Seleccione--</option>
									@foreach ($oficinas as $of)	
									<option value="{{$of->IdOfna }}">{{ $of->IdOfna." -- ".$of->DescOfna }}</option>
									@endforeach
								</select>
							</div>
	</div>
	<fieldset>
	<legend>Rango Fechas de Altas</legend>
		<div class="row">
		<div class="form-group col-md-2">
			<label>Fecha Alta</label>
			<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" size="16" type="text" value="" readonly>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			</div>
			<input type="hidden" id="dtp_input2" value="" /><br/>
		</div>
		<div class="form-group col-md-2">
			<label>Fecha Alta</label>
			<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" size="16" type="text" value="" readonly>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			</div>
			<input type="hidden" id="dtp_input2" value="" /><br/>
		</div>
		</div>

	</fieldset>	

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
