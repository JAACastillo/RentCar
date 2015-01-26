<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>
			@yield('titulo')
		</title>
		
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/renta/css/jquery-ui.css" type="text/css" media="all" />		
		<link rel="stylesheet" href="assets/renta/css/style.css" type="text/css" media="all" />
		<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" /> -->

		<!--[if IE]>
		<script type="text/javascript" src="assets/renta/js/html5.js"></script>
		<link rel="stylesheet" id="stylesheet-ie" href="assets/renta/css/css_ie.css" type="text/css" media="all" />
		<![endif]-->
	</head>
	<body class="{{$clase}}" ng-app='renta'>
		<div id="conteiner">
			@include('renta.menu')
			@yield('main')

			<div class="clear"></div>
			<div class="clear"></div>
			@include('renta.footer')
			<!--end:footer-->
		</div><!--end:conteiner-->
		<div id="overlay_block"></div>

		@include('renta.registerSignIn')

	<script type="text/javascript" src="assets/js/angular.min.js"></script>

	{{ HTML::script('/assets/js/ui-bootstrap-tpls-0.12.0.min-1.js') }}
	
	


	<script type="text/javascript" src="assets/renta/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery.maskedinput.js"></script>



	<link rel="stylesheet" href="assets/renta/css/calendar/jquery.datetimepicker.css">
	<script type="text/javascript" src="assets/renta/js/vendor/jquery.datetimepicker.js"></script>

	{{ HTML::script('/assets/js/bootstrap.min.js') }}

	<!--[if IE]>
	<script type="text/javascript" src="assets/renta/js/placeholder_ie.js"></script>
	<![endif]-->
	<script type="text/javascript" src="assets/renta/js/jquery.meio.mask.js"></script>
	<script type="text/javascript" src="assets/renta/js/custom-form-elements.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery.selectbox-0.2.min.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery.blueberry.js"></script>

	<!--	<script type="text/javascript" src="assets/renta/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery.ui.datepicker-es.js"></script>
-->
	<script type="text/javascript" src="assets/renta/js/custom.js"></script>
	<script type="text/javascript" src="assets/renta/js/script.js"></script>

	<script type="text/javascript" src="assets/renta/js/angular.app.js"></script>

	<link rel="stylesheet" href="assets/renta/css/vendor/bootstrap.css" type="text/css" media="all" />
	</body>

</script>
</html>