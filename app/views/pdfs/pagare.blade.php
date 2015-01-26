<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MultiAutos - Renta de Carros en El Salvador</title>
		<meta charset="UTF-8">
		<link rel='shortcut icon' href='{{ asset("assets/img/favicon.ico") }}'>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
		<style>
	    	 @page { margin: 100px 50px;}
	    	 * { font-size: 12px;}
	    	#header{position: absolute; margin-top: -70px; width: 100%;}
	     	.left {position: absolute; float: left;}
	     	.right {position: absolute; right: 10px;}
			.center {position: absolute; width: 40%;}
			.borde { border-bottom: 1px solid #ccc; }
			.page-break {page-break-before: always; }
	     	#footer {margin: 0px; position: fixed; left: 0px; top: 600px; right: 0px;  text-align: center; }
	     	#footer { position: fixed; left: 0px; bottom: -140px; right: 0px; height: 150px;  }
	     	#footer .page:after { content: counter(page, upper-roman); }
	     	.contenido {position: absolute;text-align:justify; line-height: 25px; width: 100%}
	     	.titulo{text-align:center; margin-bottom:0px; font-size: 16px;}
	     	.table, th {border: 1px solid black; margin: 0px; padding: 5px; font-size: 14px;}
	     	.table, td {border: 1px solid black; margin: 0px; padding: 5px; font-size: 13px;}
	   </style>
	</head>
	<body>
		{{-- PAGINA 1 --}}
		<header id="header">
			<center style="WIDTH: 100%;">
				<h3>
					PAGARE <BR> "SIN PROTESTO"
				</h3>
			</center>
		</header>
		<br>
		<div class="contenido">
			<p>
				Yo,
				@if($prestamo->conductor_id == $prestamo->cliente_id)
					{{ $prestamo->cliente->nombre }}.
				@else
					{{ $prestamo->cliente->conductor->nombre }}
				@endif
				Por medio de este PAGARE sin protesto, me obligo a pagar en El Salvador a la orden de MULTIACTIVOS SOCIEDAD ANONIMA DE CAPITAL VARIABLE la cantidad de $ {{ $prestamo->valorReposicion }} 00/100, dólares más interés del 1.5% por ciento mensual, pagaderos el día {{ date('d/m/Y', strtotime($prestamo->fechaReserva)) }}.
				El pago se hará en las oficinas principales situadas en la ciudad de Ilobasco Departamento de Cabañas, o en cualquiera de sus oficinas en la República de El Salvador. Dicha suma de dinero se destina para el pago de Deuda o daños, así como para cubrir cualquier transacción comercial o legal proveniente de dichas operaciones. En caso de mora, reconoceré 1.5 puntos más de intereses sobre el convenido.
				<br/><br/>
				Para todos los efectos de esta obligación, mercantil, fijo como domicilio especial la ciudad de San Salvador, y en caso de acción judicial renuncio al derecho de apelar del decreto de embargo, sentencia de remate y toda otra providencia apelable que se dictare en el juicio ejecutivo o sus incidencias, siendo a mi cargo, todos los gastos que MULTIACTIVOS SOCIEDAD ANONIMA DE CAPITAL VARIABLE, hiciera en el cobro de este Pagaré en cualquier concepto, incluidos los de cancelación y de cobranza judiciales o extrajudiciales, inclusive los llamados personales y aun cuando por regla general no fuere condenado a ello, faculto a MULTIACTIVOS SOCIEDAD ANONIMA DE CAPITAL VARIABLE para que designe a la persona depositaria de los bienes que se embarguen, a quien relevo de la obligación de rendir fianza para ejercer su cargo. En la ciudad de San Salvador.
				<br/><br/>
				@if($prestamo->conductor_id == $prestamo->cliente_id)
					Deudor: {{ $prestamo->cliente->nombre }}.
					<br/>
					DOCUMENTO DE IDENTIDAD: {{ $prestamo->cliente->doc_unico }}
					<br/>
					Dirección: {{ $prestamo->cliente->direccion }}
					<br/>
					Teléfono: {{ $prestamo->cliente->telefono }}
				@else
					Deudor: {{ $prestamo->cliente->adicional_nombre }}.
					<br/>
					DOCUMENTO DE IDENTIDAD: {{ $prestamo->cliente->doc_unico_2 }}
					<br/>
					Teléfono: {{ $prestamo->cliente->adicional_telefono }}
				@endif
				<br/><br/>
				<span class="left" style="width: 30%;">F._________________________________</span>
			</p>
		</div>
	</body>
</html>