		<legend>Histórico de movimientos
	</legend>
		<table class="table table-bordered table-striped">
			<thead> 
				<tr>
					<th width="180px">Fecha Movimiento</th>
					<th>Usuario Responsable</th>
					<th>Ubicación</th>
					@if(isset($nuevo))
					<th>Acciones</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach($detalles as $detalle)
				<tr>
					<td>{{$detalle->FecMovto}}</td>
					<td>
					{{$detalle->empleado->DescEmp}}
					<br>
					<i>{{$detalle->empleado->oficina->DescOfna}}</i>
					</td>
					<td>
						{{$detalle->Ubicac.' -- '.$detalle->ubicacion->DescOfna}}
					</td>
					@if(isset($nuevo))
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-modal-lg"><i class="fa fa-refresh"></i> Cambiar</button>
					</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>