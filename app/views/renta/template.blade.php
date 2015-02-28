<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>
			@yield('titulo')
		</title>
		
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{{HTML::style("assets/renta/css/jquery-ui.css")}}		
		{{HTML::style("assets/renta/css/style.css")}}
		<!-- {{HTML::style("assets/css/bootstrap.min.css")}} -->

		<!--[if IE]>
		{{HTML::script("assets/renta/js/html5.js")}}
		<link rel="stylesheet" id="stylesheet-ie" href="assets/renta/css/css_ie.css")}}
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

	{{HTML::script("assets/js/angular.min.js")}}

	{{ HTML::script('/assets/js/ui-bootstrap-tpls-0.12.0.min-1.js') }}
	
	


	{{HTML::script("assets/renta/js/jquery-1.10.1.min.js")}}
	{{HTML::script("assets/renta/js/jquery-migrate-1.2.1.min.js")}}
	{{HTML::script("assets/renta/js/jquery-ui.js")}}
	{{HTML::script("assets/renta/js/jquery.maskedinput.js")}}



	{{HTML::style("assets/renta/css/calendar/jquery.datetimepicker.css")}}
	{{HTML::script("assets/renta/js/vendor/jquery.datetimepicker.js")}}

	{{ HTML::script('/assets/js/bootstrap.min.js') }}

	<!--[if IE]>
	{{HTML::script("assets/renta/js/placeholder_ie.js")}}
	<![endif]-->
	{{HTML::script("assets/renta/js/jquery.meio.mask.js")}}
	{{HTML::script("assets/renta/js/custom-form-elements.js")}}
	{{HTML::script("assets/renta/js/jquery.selectbox-0.2.min.js")}}
	{{HTML::script("assets/renta/js/jquery.blueberry.js")}}

	<!--	{{HTML::script("assets/renta/js/jquery-ui-timepicker-addon.js")}}
		{{HTML::script("assets/renta/js/jquery.ui.datepicker-es.js")}}
-->
	{{HTML::script("assets/renta/js/custom.js")}}
	{{HTML::script("assets/renta/js/script.js")}}

	{{HTML::script("assets/renta/js/angular.app.js")}}

	{{HTML::style("assets/renta/css/vendor/bootstrap.css")}}
	</body>

</script>
</html>