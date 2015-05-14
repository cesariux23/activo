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

			{!!Form::text('FecAlta', @$FecAlta, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
		</div>
	</div>
</fieldset>

<br>

<fieldset>
	<legend>Descripción del Artículo:</legend>
	<div class="form-group">
		{!!Form::textarea('DescArt', @$DescArt, array("class"=>"form-control", "rows"=>"3","placeholder"=>"Descripción"))!!}
	</div>
</fieldset>

<br>

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
<br>
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

	<div class="col-md-6">.¿El bien está actualmente localizado físicamente?
		<label class="radio-inline">
			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" data-toggle="modal" data-target=".bs-modal-lg"> S
			</label>
			<label class="radio-inline">
				<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N"> N
			</label>
		</div>
	</div>
	</fieldset>
	<br>
	@include('forms.botones',['txt_btn' => $txt_btn, 'path'=>'activofijo'])


	<!-- Modal -->
			<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3 class="modal-title" id="myModalLabel">Movimiento Histórico</h3>
						</div>
						<div class="modal-body">
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
									<label>NúmeroInv.</label>
									{!!Form::text('NumInv', @$NumInv, array("class"=>"form-control","placeholder"=>"# Inventario"))!!}
								</div>
								<div class="col-md-2">
									<label>Año P.</label>
									{!!Form::text('AnoPrg', @$AnoPrg, array("class"=>"form-control","placeholder"=>"Año P."))!!}
								</div>
								<div class="col-md-3">
									<label>Denominación</label>
									{!!Form::text('Denomin', @$Denomin, array("class"=>"form-control","placeholder"=>"Denominación"))!!}
								</div>
							</div>
							<div class="row">	
								<div class="col-md-2">
									<label>Fecha Alta</label>
									{!!Form::text('FecAlta', @$FecAlta, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
								</div>
								<div class="col-md-9">
									<label>Descrición</label>
									{!!Form::textarea('DescArt', @$DescArt, array("class"=>"form-control", "rows"=>"2","placeholder"=>"Descripción"))!!}
								</div>
							</div>
							<fieldset>
								<legend>Usuario responsable/resguardo del Bien</legend>
								<div class="row">
									<div class="col-md-2">
										<label>Fecha movimiento</label>
										{!!Form::text('FecAlta', @$FecAlta, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
									</div>
									<div class="col-md-2">
										<label>Clave</label>
										<input type="text" id="idprov" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Nombre Usuario</label>
										<select name="rubro" id="rubdesc" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($rubro as $rubdesc)	
											<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-4">
										<label>Departamento</label>
										<select name="rubro" id="rubdesc" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($rubro as $rubdesc)	
											<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
											@endforeach
										</select>
									</div>
								</div>		
							</fieldset>
							<br>
							<fieldset>
								<legend>Estado y Ubicación del Bien</legend>
								<div class="row">
									<div class="col-md-2">
										<label>Estado del Bien</label>
										{!!Form::text('FecAlta', @$FecAlta, array("class"=>"form-control","placeholder"=>"1.Bueno"))!!}
									</div>
									<div class="col-md-2">
										<label>Ubicación</label>
										<input type="text" id="idprov" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Edificio</label>
										<select name="rubro" id="rubdesc" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($rubro as $rubdesc)	
											<option value="{{$rubdesc->IdRub }}">{{ $rubdesc->IdRub." -- ".$rubdesc->DescRub }}</option>
											@endforeach
										</select>
									</div>

								</div>
								</fieldset>
								<br>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>



	