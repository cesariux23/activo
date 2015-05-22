<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IVEA :: Sistema de Control de Activo Fijo</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<!-- El CSS del Font Awesome-->
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
	<!-- El CSS del Font Awesome-->
	<link href="{{ asset('/css/ivea.css') }}" rel="stylesheet">
	<!-- El CSS del Calendario -->
	<link href="{{ asset('/css/calendario.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- Calendario boodstrap-->
	
    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Activo Fijo</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Procesos<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/federal/activofijo') }}">Federal</a></li>
								<li><a href="{{ url('/estatal/activofijo') }}">Estatal</a></li>
								<li class="divider"></li>
								<li><a href="#">Consultas</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/adscripciones') }}">Oficinas y Departamentos</a></li>
								<li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
								<li><a href="{{ url('/empleados') }}">Empledos</a></li>
								<li><a href="{{ url('/tipoadquisiciones') }}">Tipos de Adquisición</a></li>
								<li><a href="{{ url('/rubros') }}">Rubros</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/proveedores') }}">Provedores</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/reportes') }}">Reportes</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar sesión</a></li>
						<li><a href="{{ url('/auth/register') }}">Registrar</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<!-- Notificaciones -->
			@include('flash::message')
			<!-- Contenido -->
			@yield('content')
		</div>

		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<!-- This is only necessary if you do Flash::overlay('...') -->
		<script>
			$('#flash-overlay-modal').modal();
		</script>
		
		
		

<script type="text/javascript" src="{{ asset('/js/jquery/jquery-1.8.3.min.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
        //language:  'es',
	$('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

</script>
		@yield('script')
	</body>
	</html>
