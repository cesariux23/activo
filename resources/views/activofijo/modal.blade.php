<!-- Modal -->
<div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" ng-init='empleados={{$empleados}}; oficinas={{$oficinas}}'>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Movimiento Histórico</h3>
			</div>
			<div class="modal-body">
				<fieldset>
					<legend>Usuario responsable/resguardo del Bien</legend>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Fecha Alta</label>
							<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input class="form-control" size="16" type="text" value="" readonly name="FecMovto" ng-model="temp.FecMovto">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<input type="hidden" id="dtp_input2" value="" /><br/>
						</div>
						<div class="col-md-2">
							<label>Clave</label>
							{!!Form::text('detalle[IdEmp]', null, array("class"=>"form-control txt","placeholder"=>"Clave empleado", 'id'=>"emp", 'mayus', "ng-model"=>"temp.IdEmp"))!!}
						</div>
						<div class="col-md-7">
							<label >Nombre Usuario</label>
							<select ng-options="e.IdEmp as e.IdEmp+' -- '+e.DescEmp for e in empleados" ng-model="temp.IdEmp" class="form-control" ng-change="
								IdOfna=(empleados | filter:{IdEmp:temp.IdEmp})[0].IdOfna;
								temp.Ubicac=IdOfna;
								">
							<option value="">-- Seleccione --</option>
							</select>
							<span id="departamento" ng-show="temp.Ubicac"><% (oficinas | filter:{IdOfna:IdOfna})[0].IdOfna %> -- <% (oficinas | filter:{IdOfna:IdOfna})[0].DescOfna%></span>
							<br>
							
						</div>
					</div>	
				</fieldset><br>	

				<fieldset>
					<legend>Estado y Ubicación del Bien</legend>
					<div class="row">
						<div class="col-md-3">
							<label>Estado del Bien</label>
							{!!Form::select('detalle[EdoDelBien]',['1.BUENO'=>'1.BUENO',
								'2.MALO'=>'2.MALO',
								'3.REGULAR'=>'3.REGULAR',
								'4.DESUSO' => '5.DESUSO',
								'5.EXTRAVIO' => '5.EXTRAVIO',
								'6.BAJA(INSERVIBLE)' => '6.BAJA(INSERVIBLE)',
								'7.BAJA(ROBO)' => '7.BAJA(ROBO)',
								'8.BAJA(TRANSFER)' => '8.BAJA(TRANSFER)',
								'9.BAJA(SINIESTRO)' => '9.BAJA(SINIESTRO)',
								'10.BAJA(RECLASIFIC)' => '10.BAJA(RECLASIFIC)'],null,['class'=>'form-control', 'ng-model'=>"temp.EdoDelBien" ])!!}
							</div>
							<div class="col-md-2">
								<label>Ubicación</label>
								{!!Form::text('detalle[Ubicac]', null, array("class"=>"form-control txt","placeholder"=>"Clave ubicación", 'id'=>"ubic",'ng-model'=>"temp.Ubicac" ))!!}
							</div>
							<div class="col-md-7">
								<label>Edificio</label>
								<select id="idubic" class="form-control" ng-model="temp.Ubicac">
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
						
						@if(isset($guardar))
						<button type="button" class="btn btn-default" data-dismiss="modal" id="btnCerrar">Cancelar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
						@else
						<button type="button" class="btn btn-default" data-dismiss="modal" id="btnCerrar">Cerrar</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAceptar" ng-click="detalle=temp">Aceptar</button>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>


