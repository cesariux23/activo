<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Imprimiendo</title>

	<!-- Bootstrap CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('/css/imprime.css') }}" rel="stylesheet" media="print">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		<body>
			<div class="container">
				<table class="table table-bordered">
					<table class="table table-bordered">
						<thead class="well">
							<tr>
								<th width="220px" rowspan="2">Número Inventario / Denominacion / ID</th>
								<th colspan="5">Descripción del Artículo</th>
							</tr>
							<tr>
								<th>Responsable
									@if(!isset($oficina))
									/ Ubicación
									@endif
								</th>
								<th>Estado</th>
								<th>Adq.</th>
								<th>Rubro</th>
								<th>Costo</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($activofijo as $a)
							<tr>
								<td rowspan="2" class="borde">
									<b>{{$a->numeroInventario}}</b><br>
									<span class="text-muted">{{$a->Denomin}}</span><br>
									<b>{{$a->IdDet}}</b></td>
									<td colspan="5">{{$a->DescArt}}</td>
								</tr>
								<tr>
									<td class="borde">
										<b>{{$a->DescEmp}}</b>
										@if(!isset($oficina))
											<br>
											<span class="text-muted">{{$a->DescOfna}}</span>
										@endif
									</td>
									<td class="borde"><span class="text-success">{{$a->Edo}}</span></td>
									<td class="borde">{{$a->IdTipAdq}}</td>
									<td class="borde">{{$a->IdRub}}</td>
									<td class="borde">{{$a->Costo}}</td>

			
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<!-- jQuery -->
					<script src="//code.jquery.com/jquery.js"></script>
					<!-- Bootstrap JavaScript -->
					<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
				</body>
				</html>