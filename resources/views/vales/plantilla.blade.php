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
	<!-- ultimo-->
	<div style="padding-left:0.5cm;">
		<div style="padding-bottom:0.5cm;">
			<div style="position: absolute; left:18cm;">{{$bien->ultimo->IdEmp}}</div>
			<span>{{$bien->ultimo->empleado->DescEmp}}</span>
		</div>
		<div style="text-align:center; padding-bottom:10px;">
			{{$bien->ultimo->ubicacion->DescOfna}}
		</div>
		<div>{{$bien->Edo}}</div>
		<div style="height:0.5cm; width:15cm;">
			{{$bien->ultimo->Comenta}}
		</div>
		<div>{{$bien->ultimo->FecMovto}}</div>

	</div>
</div>