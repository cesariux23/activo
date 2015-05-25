<fieldset>
	<legend>Recurso {{ucfirst($tipo)}}</legend> 
	<div class="row">
		<div class="col-md-1">
			<label>Grupo</label>
			{!!Form::text('Gpo', old('Gpo'), array("class"=>"form-control","placeholder"=>"Grupo"))!!}
		</div>
		<div class="col-md-2">
			<label>Clave</label>
			{!!Form::text('Clave', @$Clave, array("class"=>"form-control","placeholder"=>"Clave"))!!}
		</div>
		<div class="col-md-2">
			<label>Número Inv.</label>
			{!!Form::text('NumInv', @$NumInv, array("class"=>"form-control","placeholder"=>"# Inventario"))!!}
		</div>
		<div class="col-md-1">
			<label>Año P.</label>
			{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
		</div>
		<div class="col-md-1">
			<label>Tipo</label>
			{!!Form::text('TpoBien', @$TpoBien, array("class"=>"form-control","placeholder"=>"Tipo", 'disabled' => 'disabled'))!!}
		</div>
		<div class="col-md-3">
			<label>Denominación</label>
			{!!Form::text('Denomin', @$Denomin, array("class"=>"form-control","placeholder"=>"Denominación"))!!}
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

<fieldset>
	<legend>Descripción del Artículo:</legend>
	<div class="form-group">
		{!!Form::textarea('DescArt', @$DescArt, array("class"=>"form-control", "rows"=>"3","placeholder"=>"Descripción","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
	</div>
</fieldset>

<fieldset>
	<legend>Información del Proveedor</legend>
	<div class="row">
		<div class="col-md-2">
			<label>Id</label>
			<input type="text" id="prov" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Nombre</label>
			<select name="IdProv" id="idprov" class="form-control">
				<option value="">--Seleccione--</option>
				@foreach ($proveedores as $prov)	
				<option value="{{$prov->IdProv }}">{{ $prov->IdProv." -- ".$prov->DescProv}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<label>Número Factura</label>
			{!!Form::text('NumFact', @$NumFact, array("class"=>"form-control","placeholder"=>"# Factura"))!!}
		</div>
		<div class="form-group col-md-2">
			<label>Fecha Factura</label>
			<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" size="16" type="text" value="" readonly>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			</div>
			<input type="hidden" id="dtp_input2" value="" /><br/>
		</div>

		<div class="col-md-2">
			<label>Costo</label>
			{!!Form::text('Costo', @$Costo, array("class"=>"form-control","placeholder"=>"Costo"))!!}
		</div>
	</div>
</fieldset><br>

<fieldset>
	<legend>Tipo de Adquisición y Rubro</legend>
	<div class="row">
		<div class="col-md-2">
			<label>Id</label>
			<input type="text" id="idadq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
		</div>
		<div class="col-md-3">
			<label>Nombre</label>
			<select name="IdTipAdq" id="adq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">	
				<option value="">--Seleccione--</option>
				@foreach ($adquisicion as $adq)	
				<option value="{{$adq->IdTipAdq }}">{{ $adq->IdTipAdq." -- ".$adq->DescAdq }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
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

		<div class="col-md-2">
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
		</div><br>

		<div class="row">
			<div class="col-md-6">¿El bien está actualmente localizado físicamente?
				<label class="radio-inline">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio1"> S
				</label>
				<label class="radio-inline">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N"> N
				</label>
			</div>
		</div>
	</fieldset><br>








