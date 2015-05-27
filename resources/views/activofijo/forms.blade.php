<fieldset>
	<legend>Recurso {{ucfirst($tipo)}}</legend> 
	<div class="row">
		<div class="col-md-1">
			<label>Grupo</label>
			{!!Form::text('Gpo', old('Gpo'), array("class"=>"form-control","placeholder"=>"Grupo",'mayus','ng-model'=>"bien.Gpo"))!!}
		</div>
		<div class="col-md-2">
			<label>Clave</label>
			{!!Form::text('Clave', @$Clave, array("class"=>"form-control","placeholder"=>"Clave", 'mayus','ng-model'=>"bien.Clave"))!!}
		</div>
		<div class="col-md-2">
			<label>Número Inv.</label>
			{!!Form::text('NumInv', @$NumInv, array("class"=>"form-control","placeholder"=>"# Inventario", 'mayus','ng-model'=>"bien.NumInv"))!!}
		</div>
		<div class="col-md-1">
			<label>Año P.</label>
			{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P.", 'mayus','ng-model'=>"bien.AnoProg"))!!}
		</div>
		<div class="col-md-1">
			<label>Tipo</label>
			{!!Form::text('TpoBien', @$TpoBien, array("class"=>"form-control","placeholder"=>"Tipo", 'disabled' => 'disabled'))!!}
		</div>
		<div class="col-md-3">
			<label>Denominación</label>
			{!!Form::text('Denomin', @$Denomin, array("class"=>"form-control","placeholder"=>"Denominación", 'mayus','ng-model'=>"bien.Denomin"))!!}
		</div>

		<div class="form-group col-md-2">
			<label>Fecha Alta</label>
			<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				<input class="form-control" size="16" type="text" value="{{Input::old('FecAlta')}}" readonly ng-model="bien.FecAlta" ng-change="detalle.FecMovto=bien.FecAlta">
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
			<input type="text" id="prov" class="form-control txt" ng-model="bien.IdProv">
		</div>
		<div class="col-md-4">
			<label>Nombre</label>
			<select name="IdProv" id="idprov" class="form-control" ng-model="bien.IdProv">
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
				<input class="form-control" size="16" type="text" value="" readonly ng-model="bien.FecFact">
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
			<input type="text" id="adq" class="form-control txt" ng-model="bien.IdTipAdq" mayus>
		</div>
		<div class="col-md-4">
			<label>Nombre</label>
			<select name="IdTipAdq" id="idadq" class="form-control" ng-model="bien.IdTipAdq">	
				<option value="">--Seleccione--</option>
				@foreach ($adquisicion as $adq)	
				<option value="{{$adq->IdTipAdq }}">{{ $adq->IdTipAdq." -- ".$adq->DescAdq }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<label>Id Rubro</label>
			<input type="text" id="rub" class="form-control txt" ng-model="bien.IdRub" mayus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
		</div>
		<div class="col-md-4">
			<label>Rubro</label>
			<select name="IdRub" id="idrub" class="form-control" ng-model="bien.IdRub">
				<option value="">--Seleccione--</option>
				@foreach ($rubro as $rubdesc)	
				<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
				@endforeach
			</select>
		</div>
		</div>
		<br>
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








