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
</head>
<body>
	<div class="container">
	@include('activofijo.tablabienes', ['imprime'=>true]);
	</div>
</body>
</html>