<div style="font-size:10px; padding-top:2.5cm; padding-left:4cm;">
	<div style="padding-bottom:1cm;">
		<div style="padding-bottom:10px;">
			<div style="position: absolute; left:15cm;">{{$bien->numeroInventario}}</div>
			<span>{{$bien->Denomin}}</span>
		</div>
		<div style=" height:1.5cm; width:15cm;">
			{{$bien->DescArt}}
		</div>
		<div>
			<span>{{$bien->FecAlta}}</span>
			<span style="position:absolute; left:15cm;"><b>{{$bien->Costo}}</b></span>
		</div>
	</div>
	<!-- ultimaAsignacion-->
	<div style="padding-left:0.5cm;">
		<div style="padding-bottom:0.5cm;">
			<div style="position: absolute; left:18cm;">{{$bien->ultimaAsignacion->IdEmp}}</div>
			<span>{{$bien->ultimaAsignacion->DescEmp}}</span>
		</div>
		<div style="text-align:center; padding-bottom:10px;">
			{{$bien->ultimaAsignacion->DescOfna}}
		</div>
		<div>{{$bien->Edo}}</div>
		<div style="height:0.5cm; width:15cm;">
			{{$bien->ultimaAsignacion->Comenta}}
		</div>
		<div>{{$bien->ultimaAsignacion->FecMovto}}</div>
	</div>
</div>