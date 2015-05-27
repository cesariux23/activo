<div>
	<div style="position: absolute; left:80px; text-align:center;">
		
	<div style="font-size:10px;">
			<b>ACTIVO FIJO IVEA</b><br>
			{{$bien->tipob}}
		</div>
		<div style="font-size:7px;">
			<p style="width:auto;">{{$bien->Denomin}}</p>
		</div>
	</div>
	<div>
		{!!DNS2D::getBarcodeSVG($bien->numeroInventario, "QRCODE",2.5,2.5)!!}
	</div>
	<div style="text-align:center; font-size:12px; padding-top:5px;">
		<b>{{$bien->numeroInventario}}</b>
	</div>
	
</div>
