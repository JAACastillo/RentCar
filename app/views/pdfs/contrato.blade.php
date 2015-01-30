<!DOCTYPE html>
<html lang="en">
	<head>
		<title>contrato de renta {{$prestamo->cliente->nombre}}</title>
		<meta charset="UTF-8">
		<link rel='shortcut icon' href='{{ asset("assets/img/favicon.ico") }}'>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
		<style>
	    	 @page { margin: 100px 50px;}
	    	 * { font-size: 11px; }
	    	#header{position: absolute; margin-top: -70px; width: 100%;}
	     	.left {position: absolute; float: left;}
	     	.right {position: absolute; right: 10px;}
			.center {position: absolute; width: 40%;}
			.borde { border-bottom: 1px solid #000; }
			.page-break {page-break-before: always; }
	     	#footer {margin: 0px; position: fixed; left: 0px; top: 600px; right: 0px;  text-align: center; }
	     	#footer { position: fixed; left: 0px; bottom: -140px; right: 0px; height: 150px;  }
	     	#footer .page:after { content: counter(page, upper-roman); }
	     	.contenido {position: absolute;text-align:justify; line-height: 15px; width: 100%}
	     	.titulo{text-align:center; margin-bottom:0px; font-size: 16px;}
	     	.table, th {border: 1px solid black; margin: 0px; padding: 5px; font-size: 14px;}
	     	.table, td {border: 1px solid black; margin: 0px; padding: 5px; font-size: 13px;}
	   </style>
	</head>
	<body>
		{{-- PAGINA 1 --}}
		<header id="header">
			<div style="width:30%;" class="left">
				{{--<img alt="{{$empresa->nombre}}" src="assets/img/logo-multiautos1.png"> --}}
				<img src="assets/img/{{$empresa->logo}}" width="100px" height="60px">
			</div>
			<center class="center" style="left: 210px;">
				<h3>{{$empresa->nombre}}</h3> 
					{{$empresa->direccion}}
				Tel.: {{$empresa->telefono}}
				e-mail: {{$empresa->email}}
			</center>
			<div style="width:30%;" class="right">
				<h3 class="right">CONTRATO DE ARRENDAMIENTO</h3>
				<br/>
				<p class="right">N° {{$prestamo->id}}</p>
			</div>
		</header>
		<br><br><br>
		<div class="contenido">
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->Tarjeta }}</span>
				<span class="right" style="width: 50%;">{{ date('d/m/Y', strtotime($prestamo->cliente->TarjetaVencimiento)) }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[1] Tarj.Cred.</span>
				<span class="right" style="width: 50%;">[2] Fecha de vencimiento.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 50%;">{{ strtoupper($prestamo->cliente->nombre) }}</span>
					<span class="right" style="width: 50%;">{{ strtoupper($prestamo->cliente->email) }}</span>
				</strong>
				<br/>
				<span class="left" style="width: 50%;">[3] Nombre del cliente.</span>
				<span class="right" style="width: 50%;">[4] E-mail.</span>
				<div class="borde"></div>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 30%;">{{ $prestamo->cliente->fechaNacimiento }}</span>
					<span class="center" style="left: 210px;">{{ $prestamo->cliente->Pasaporte }}</span>
					<span class="right" style="width: 30%;">{{ $prestamo->cliente->Documento }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[5] Fecha de nacimiento.</span>
				<span class="center" style="left: 210px;">[6] Pasaporte N°.</span>
				<span class="right" style="width: 30%;">[7] Documento de identidad.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 30%;">{{ $prestamo->cliente->Licencia }}</span>
					<span class="center" style="left: 210px;">{{ $prestamo->cliente->LicenciaEmision }}</span>
					<span class="right" style="width: 30%;">{{ $prestamo->cliente->LicenciaVencimiento }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[8] Licencia N°.</span>
				<span class="center" style="left: 210px;">[9] Fecha de emisión.</span>
				<span class="right" style="width: 30%;">[10] Fecha de vencimiento.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left">{{ strtoupper($prestamo->cliente->direccion) }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left">[11] Domicilio local.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->telefono }}</span>
				<span class="right" style="width: 50%;">{{ $prestamo->cliente->celular }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[12] Teléfono.</span>
				<span class="right" style="width: 50%;">[13] Celular.</span>
			</div>
			<br/>
			<div>
				<span class="left">{{ strtoupper($prestamo->cliente->direccion_2) }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left">[14] Domicilio permanente.</span>
			</div>
			<br/>
			<div>
				<span class="left">{{ $prestamo->cliente->telefono_2 }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left">[15] Teléfono.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 50%;">{{ strtoupper($prestamo->conductorNombre) }}</span>
					<span class="right" style="width: 50%;">{{ $prestamo->conductorDocumento }}</span>
					<br/>
				</strong>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[16] Conductor adicional.</span>
				<span class="right" style="width: 50%;">[17] Documento de identidad.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 30%;">{{ $prestamo->conductorLicencia }}</span>
					<span class="center" style="left: 210px;">{{ $prestamo->conductorLicenciaEmision }}</span>
					<span class="right" style="width: 30%;">{{ $prestamo->conductorLicenciaVencimiento }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[18] Licencia N°.</span>
				<span class="center" style="left: 210px;">[19] Fecha de emisión.</span>
				<span class="right" style="width: 30%;">[20] Fecha de vencimiento.</span>
			</div>
			<br/><br/>
			<center>
				<strong>DATOS DEL VEHICULO</strong>
			</center>
			<div class="borde"></div>
			<div>
				<strong>
					<span class="left" style="width: 25%;">{{ strtoupper($prestamo->carro->modelo->marca->nombre) }}</span>
					<span class="center" style="width: 25%; left: 179px;">{{ strtoupper($prestamo->carro->tipo->nombre) }}</span>
					<span class="center" style="width: 25%;  left: 350px;">{{ strtoupper($prestamo->carro->modelo->nombre) }}</span>
					<span class="right" style="width: 25%;">{{ $prestamo->carro->ano }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 25%;">[21] Marca.</span>
				<span class="center" style="width: 25%; left: 179px;">[22] Tipo.</span>
				<span class="center" style="width: 25%; left: 350px;">[23] Modelo.</span>
				<span class="right" style="width: 25%;">[24] Año.</span>
			</div>
			<br/>
			<div>
				<strong>
					<span class="left" style="width: 30%;">{{ strtoupper($prestamo->placa->color->color) }}</span>
					<span class="center" style="left: 210px;">${{ $prestamo->valorReposicion }} dólares de los USA</span>
					<span class="right" style="width: 30%;">{{ strtoupper($prestamo->placa->numero) }}</span>
				</strong>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[25] Color.</span>
				<span class="center" style="left: 210px;">[26] Valor de reposición.</span>
				<span class="right" style="width: 30%;">[27] Placa.</span>
			</div>
			<br>
			<div>
				<span style="width: 50%; float:left;"><img alt="600x300" src="assets/img/combustible.png"></span>
				<span class="right" style="width: 50%; left: 530px;"><img alt="600x300" src="assets/img/combustible.png"></span>
				<br/><br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[28] Nivel de combustible</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ strtoupper($prestamo->lugarEntrega->nombre) }}</span>
				<span class="right" style="width: 50%;">
					{{ strtoupper($prestamo->lugarDevolucion->nombre) }}
				</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[29] Lugar de entrega.</span>
				<span class="right" style="width: 50%;">[30] Lugar de devolución.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{$prestamo->fechaReserva }}</span>
				<span class="right" style="width: 50%;">{{ $prestamo->fechaDevolucion }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[31] Fecha de entrega.</span>
				<span class="right" style="width: 50%;">[32] Fecha de devolución y finalización del contrato.</span>
			</div>
			<br/>
			<div>
				<p>
					@if($prestamo->cliente_id == $prestamo->conductor_id)
						Renuncio a las coberturas de seguro adicional, entiendo y acepto las responsabilidades que contraigo con dicha renuncia y por tanto firmó en calidad de aceptación.
					@else
						Renunciamos a las coberturas de seguro adicional, entendemos y aceptamos las responsabilidades que contraemos con dicha renuncia y por tanto firmamos en calidad de aceptación.
					@endif
				</p>
			</div>
			<br/><br/>
			<div>
				@if($prestamo->cliente_id != $prestamo->conductor_id)
				<span class="left" style="width: 50%;">F.______________________________________________________</span>
				<span class="right" style="width: 50%; text-align: right;">F.______________________________________________________</span>
				<br/>
				<span class="left" style="width: 50%;"><center>{{ $prestamo->cliente->nombre }}</center></span>
				<span class="right" style="width: 50%;"><center>{{ $prestamo->cliente->adicional_nombre }}</center></span>
				<br/>
				<span class="left" style="width: 50%;"><center>ARRENDATARIO</center></span>
				<span class="right" style="width: 50%;"><center>CONDUCTOR ADICIONAL</center></span>
				@else
				<span class="center" style="left: 210px;">F._____________________________________________</span>
				<br/>
				<span class="center" style="left: 210px;"><center>{{ $prestamo->cliente->nombre }}</center></span>
				<br/>
				<span class="center" style="left: 210px;"><center>ARRENDATARIO</center></span>
				@endif
			</div>
			<br/><br/>


			<center>
				<strong>PAGARE SIN PROTESTO</strong>
			</center>
			<p>
				@if($prestamo->cliente_id == $prestamo->conductor_id)
					Yo, {{ $prestamo->cliente->nombre }}. He leído los términos y condiciones del presente contrato y lo firmo de conformidad. Debo y pagare incondicionalmente,
				@else
					Nosotros, {{ $prestamo->cliente->nombre }} y {{ $prestamo->conductorNombre }}. Hemos leído los términos y condiciones del presente contrato y lo firmamos de conformidad. Debemos y pagaremos incondicionalmente,
				@endif
				a la orden de {{$empresa->nombre}}. La cantidad señalada en el apartado del valor de reposición del vehículo del presente contrato, suscrito en esta ciudad y en la fecha señalada en la página uno y cualquier otra responsabilidad que surgiera producto del presente contrato.
			</p>
			<p>
				@if($prestamo->cliente_id == $prestamo->conductor_id)
					POR ESTE DOCUMENTO QUE ES UN PAGARE RECONOZCO DEBER Y ME COMPROMETO A PAGAR INCODICIONALMENTE A LA ORDEN DE MUTIACTIVOS, SOCIEDAD ANONIMA DE CAPITAL VARIABLE. LA CANTIDAD QUE SE INDICA EN LOS APARTADOS DE VALOR DE REPOSICIÓN DEL VEHÍCULO EN LA FECHA SEÑALADA COMO VENCIMIENTO DEL CONTRATO ESTIPULADO EN EL MISMO, ASI MISMO DECLARO QUE HE LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES DEL CONTRATO DE RENTA, DE CUYAS CLAUSULAS RECIBO UNA COPIA (<STRONG>TERMINOS Y CONDICIONES DE ESTE CONTRATO</STRONG>) Y QUE TODOS LOS IMPORTES POR RENTA, INFRACCIONES DE TRANCITO, DAÑOS Y FALTANTES, ROBO TOTAL Y PARCIAL DEL AUTOMOVIL, LUCRO CESANTE Y CUALQUIER OTRO DERIVADO DE ESTE CONTRATO, ME PUEDE SER CARGADO Y EXIGIDO INMEDIATAMENTE EN EFECTIVO O CARGADOS A LA TARJETA DE CREDITO QUE PRESENTO EN ESTE ACTO.
				@else
					POR ESTE DOCUMENTO QUE ES UN PAGARE RECONOCEMOS DEBER Y NOS COMPROMETEMOS A PAGAR INCODICIONALMENTE A LA ORDEN DE MUTIACTIVOS, SOCIEDAD ANONIMA DE CAPITAL VARIABLE. LA CANTIDAD QUE SE INDICA EN LOS APARTADOS DE VALOR DE REPOSICIÓN DEL VEHÍCULO EN LA FECHA SEÑALADA COMO VENCIMIENTO DEL CONTRATO ESTIPULADO EN EL MISMO, ASI MISMO DECLARAMOS QUE HEMOS LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES DEL CONTRATO DE RENTA, DE CUYAS CLAUSULAS RECIBIMOS UNA COPIA (<STRONG>TERMINOS Y CONDICIONES DE ESTE CONTRATO</STRONG>) Y QUE TODOS LOS IMPORTES POR RENTA, INFRACCIONES DE TRANCITO, DAÑOS Y FALTANTES, ROBO TOTAL Y PARCIAL DEL AUTOMOVIL, LUCRO CESANTE Y CUALQUIER OTRO DERIVADO DE ESTE CONTRATO, NOS PUEDE SER CARGADO Y EXIGIDO INMEDIATAMENTE EN EFECTIVO O CARGADOS A LA TARJETA DE CREDITO QUE PRESENTAMOS EN ESTE ACTO.
				@endif
			</p>
			<br/><br/><br/><br/>
			<div>
				@if($prestamo->cliente_id != $prestamo->conductor_id)
				<span class="left" style="width: 50%;">F.______________________________________________________</span>
				<span class="right" style="width: 50%; text-align: right;">F.______________________________________________________</span>
				<br/>
				<span class="left" style="width: 50%;"><center>{{ $prestamo->cliente->nombre }}</center></span>
				<span class="right" style="width: 50%;"><center>{{ $prestamo->conductorNombre }}</center></span>
				<br/>
				<span class="left" style="width: 50%;"><center>ARRENDATARIO</center></span>
				<span class="right" style="width: 50%;"><center>CONDUCTOR ADICIONAL</center></span>
				@else
				<span class="center" style="left: 210px;">F._____________________________________________</span>
				<br/>
				<span class="center" style="left: 210px;"><center>{{ $prestamo->cliente->nombre }}</center></span>
				<br/>
				<span class="center" style="left: 210px;"><center>ARRENDATARIO</center></span>
				@endif
			</div>
			<br/><br/><br/><br/>
			<div>
				<span class="left" style="width: 50%;">Atendido por: {{ Auth::user()->nombre }}</span>
			</div>
			<div class="page-break"></div>
			@include('pdfs.contratoPage2')
	</body>
</html>