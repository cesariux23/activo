	<fieldset>
		<legend>Descripción del Artículo:</legend>
		<div class="form-group">
			{!!Form::textarea('DescArt', @$DescArt, array("class"=>"form-control", "rows"=>"3","placeholder"=>"Descripción"))!!}
		</div>
	</fieldset>


	<fieldset>
		<legend>Información del Proveedor</legend>
		<div class="row"> 	
			<div class="col-md-2">
				<label>Id</label>
				<input type="text" id="idprov" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Nombre</label>
				<select name="proveedor" id="prov" class="form-control">
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


	<fieldset>
		<legend>Tipo de Adquisición y Rubro</legend>
		<div class="row">
			<div class="col-md-2">
				<label>Id</label>
				<input type="text" id="idadq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
			</div>
			<div class="col-md-3">
				<label>Nombre</label>
				<select name="adquisicion" id="adq" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">	
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
				<select name="rubro" id="rubdesc" class="form-control">
					<option value="">--Seleccione--</option>
					@foreach ($rubro as $rubdesc)	
					<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-2">
				<label>Estado</label>
				{!!Form::text('Edo', @$Edo, array("class"=>"form-control","placeholder"=>"Estado"))!!}
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Último Movimiento Histórico</legend>
		<div class="row">
			<div class="col-md-2">
				<label>Fecha</label>
				{!!Form::text('FecMovto', @$FecMovto, array("class"=>"form-control","placeholder"=>"Fecha"))!!}
			</div>
			<div class="col-md-2">
				<label>Usuario Responsable</label>
				{!!Form::text('DescEmp', @$DescEmp, array("class"=>"form-control","placeholder"=>"Nombre"))!!}
			</div>
			<div class="col-md-2">
				<label>Departamento</label>
				{!!Form::text('DescOfna', @$DescOfna, array("class"=>"form-control","placeholder"=>"Departamento"))!!}
			</div>
			<div class="col-md-6">.¿El bien está actualmente localizado Físicamente?
				<label>Localizado</label>
				{!!Form::text('Localiz', @$Localiz, array("class"=>"form-control","placeholder"=>"S/N"))!!}
			</div>
		</div>
	</fieldset><br>

@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'activofijo'])