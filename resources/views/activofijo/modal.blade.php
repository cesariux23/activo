<!-- Modal -->
			<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3 class="modal-title" id="myModalLabel">Movimiento Histórico</h3>
						</div>
						<div class="modal-body">
							
							<fieldset>
								<legend>Usuario responsable/resguardo del Bien</legend>
								<div class="row">
									<div class="col-md-2">
										<label>Fecha movimiento</label>
										{!!Form::text('detalle[FecMovto]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
									</div>
									<div class="col-md-2">
										<label>Clave</label>
										{!!Form::text('detalle[IdEmp]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
									</div>
									<div class="col-md-4">
										<label>Nombre Usuario</label>
										<select name="detalle[IdEmp]2" id="usuario" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($empleados as $emp)	
											<option value="{{$emp->IdEmp }}">{{ $emp->IdEmp." -- ".$emp->DescEmp }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-4">
										<label>Departamento</label>
										<select  id="departamentoEmpleado" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($oficinas as $of)	
											<option value="{{$of->IdOfna }}">{{ $of->IdOfna." -- ".$of->DescOfna }}</option>
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
										{!!Form::text('detalle[Ubicac]', null, array("class"=>"form-control","placeholder"=>"Fecha Alta"))!!}
									</div>
									<div class="col-md-4">
										<label>Edificio</label>
										<select name="detalle[Ubicac]" id="oficina" class="form-control">
											<option value="">--Seleccione--</option>
											@foreach ($oficinas as $of)	
											<option value="{{$of->IdOfna }}">{{ $of->IdOfna." -- ".$of->DescOfna }}</option>
											@endforeach
										</select>
									</div>

								</div>
								</fieldset>
								<br>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
								</div>
							</div>
						</div>
					</div>
				</div>