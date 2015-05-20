<fieldset>
	<legend>Recurso {{ucfirst($tipo)}}</legend> 
	<div class="row">
		<div class="col-md-2">
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
		<div class="col-md-2">
			<label>Denominación</label>
			{!!Form::text('Denomin', @$Denomin, array("class"=>"form-control","placeholder"=>"Denominación"))!!}
		</div>
		<div class="col-md-2">
			<label>Fecha Alta</label>
			{!!Form::text('FecAlta', @$FecAlta, array("id"=>"FecAlta", "class"=>"form-control","placeholder"=>"AÑO/MES/DIA"))!!}
		</div>
	</div>
</fieldset>

<br>

<fieldset>
	<legend>Descripción del Artículo:</legend>
	<div class="form-group">
		{!!Form::textarea('DescArt', @$DescArt, array("class"=>"form-control", "rows"=>"3","placeholder"=>"Descripción","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
	</div>
</fieldset><br>

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
	<div class="col-md-2">
		<label>Fecha Factura</label>
		{!!Form::text('FecFact', @$FecFact, array("class"=>"form-control","placeholder"=>"ID"))!!}
	</div>
	<div class="col-md-2">
		<label>Costo</label>
		{!!Form::text('Costo', @$Costo, array("class"=>"form-control","placeholder"=>"Costo"))!!}
	</div>
	</div>
</fieldset>

<br>

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
		<label>Estado</label>
		{!!Form::text('Edo', @$Edo, array("class"=>"form-control","placeholder"=>"Estado","style"=>"text-transform:uppercase;", "onkeyup"=>"javascript:this.value=this.value.toUpperCase();"))!!}
	</div>
	</div>
</fieldset>
<br>

<fieldset>

		<div class="col-md-6">¿El bien está actualmente localizado físicamente?
			<label class="radio-inline">
			<input type="radio" name="inlineRadioOptions" id="inlineRadio1"> S
			</label>
			<label class="radio-inline">
				<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N"> N
			</label>
		</div>

</fieldset>
	<br>


	



	