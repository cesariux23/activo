<!DOCTYPE html>
<html lang="es_ES">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IVEA :: Sistema de Control de Activo Fijo</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<!-- El CSS del Font Awesome-->
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
	<!-- El CSS del IVEA-->
	<link href="{{ asset('/css/ivea.css') }}" rel="stylesheet">
	<!-- El CSS del Calendario -->
	<link href="{{ asset('/css/calendario.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- Calendario boodstrap-->

    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">

    <!-- imprime -->
    <link href="{{ asset('/css/imprime.css') }}" rel="stylesheet" media="print">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body ng-app="activofijo">
		<div id="cover">
			<div class="cargando">Esto tomará un segundo <b>:)</b></div>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../" title="Activo Fijo"><i class="fa fa-archive"></i> Activo Fijo</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Procesos"><i class="fa fa-cogs"></i> Procesos<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/federal/activofijo') }}" title="Federal"> Federal</a></li>
								<li><a href="{{ url('/estatal/activofijo') }}" title="Estatal"> Estatal</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/baja/federal/activofijo') }}" title="Baja Federal"> Baja Federal</a></li>
								<li><a href="{{ url('/baja/estatal/activofijo') }}" title="Baja Estatal"> Baja Estatal</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/bajadefinitiva/federal/activofijo') }}" title="Baja Definitiva Federal"> Baja Definitiva Federal</a></li>
								<li><a href="{{ url('/bajadefinitiva/estatal/activofijo') }}" title="Baja Definitiva Estatal"> Baja Definitiva Estatal</a></li>
								<li class="divider"></li>
								<li><a href="#" title="Consultas"> Consultas</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Catálogos"><i class="fa fa-book"></i> Catálogos<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/adscripciones') }}" title="Oficinas y Departamentos"> Oficinas y Departamentos</a></li>
								<li><a href="{{ url('/usuarios') }}" title="Usuarios"> Usuarios</a></li>
								<li><a href="{{ url('/empleados') }}" title="Empledos"> Empledos</a></li>
								<li><a href="{{ url('/tipoadquisiciones') }}" title="Tipos de Adquisición"> Tipos de Adquisición</a></li>
								<li><a href="{{ url('/rubros') }}" title="Rubros"> Rubros</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/proveedores') }}" title="Provedores"> Provedores</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Reportes"><i class="fa fa-print"></i> Reportes<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/reportes') }}" title="Reporte General"> Reporte General</a></li>
								<li><a href="{{ url('/especifico') }}" title="Reporte Especifico"> Reporte Especifico</a></li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}" title="Iniciar sesión"><i class="fa fa-key"></i> Iniciar sesión</a></li>
						<li><a href="{{ url('/auth/register') }}" title="Registrar"><i class="fa fa-user-plus"></i> Registrar</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Salir"><i class="fa fa-unlock"></i> {{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
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
		<script type="text/javascript" src="{{ asset('/js/angular.min.js') }}" charset="UTF-8"></script>
		<script type="text/javascript" src="{{ asset('/js/app.js') }}" charset="UTF-8"></script>




<script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
        //language:  'es',
				$(window).load(function(){
			    $('#cover').fadeOut(100);
			})
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
