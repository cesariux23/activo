<legend>Histórico de movimientos</legend>
<table class="table table-bordered table-striped">
	<thead> 
		<tr>
			<th width="180px">Fecha Movimiento</th>
			<th>Usuario Responsable</th>
			<th>Ubicación</th>
			<th>Estado</th>
			@if(isset($nuevo))
			<th width="150px">Acciones</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($detalles as $detalle)
		<tr>
			<td id="fecha">
				{{$detalle->FecMovto}}
				@if($detalle->Ultimo==1)
				<br>
				<span class="label label-success">Último</span>
				@endif
			</td>
			<td id="nombre">
				{{$detalle->empleado->IdEmp.' -- '.$detalle->empleado->DescEmp}}
				<br>
			</td>
			<td id="nombreubicacion">
				{{$detalle->Ubicac.' -- '.$detalle->ubicacion->DescOfna}}
			</td>
			<td id="estado">
				{{$detalle->EdoDelBien}}
			</td>
			@if(isset($nuevo))
			<td>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-modal-lg" id="btnCambiar"><i class="fa fa-refresh"></i> Cambiar</button>
			</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>