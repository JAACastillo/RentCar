<h1>MultiAutos El Salvador</h1>
<h3>Tu reserva ha sido aprobada</h3>
<p>Gracias por registrate.</p>
<div>
	Su contraseña es: {{ $clave }}
</div>
	<br/><br/>
<p style="text-align: justify">Hola {{ $prestamo->cliente->nombre }} en estos momentos estamos procesando tu solicitud de reserva, los datos enviados son los siguientes:</p>
<div style="float: left; padding: 0 25px 10px 25px">
	<p>Modelo del Auto: {{ $prestamo->modelo->modelo }}</p>
</div>
<div style="float: right; padding: 0 25px 10px 25px">
	<p>Lugar de Entrega: {{ $prestamo->lugarEntrega }}</p>
</div>
<div style="clear: both"></div>
<div style="float: left; padding: 0 25px 10px 25px">
	<p>Fecha / Hora de Reserva: {{ date('d/m/Y h:i A', strtotime($prestamo->horario_rsv)) }}</p>
</div>
<div style="float: right; padding: 0 25px 10px 25px">
	<p>Lugar de Devolución: {{ $prestamo->lugarDevolucion }}</p>
</div>
<div style="clear: both"></div>
<div style="float: left; padding: 0 25px 10px 25px">
	<p>Fecha / Hora de Devolución: {{ date('d/m/Y h:i A', strtotime($prestamo->horario_dvl)) }}</p>
</div>
<div style="clear: both"></div>
<p style="text-align: justify">
	Si desea modificar los datos del pedido puedes hacerlo mediante este código: {{ $prestamo->password }}
	<br/>
	Si tienes alguna consulta o duda con respecto a nuestros servicios, puedes llamarnos al (numero de teléfono) o al correo (correo electrónico).
	<br/>
	En Multi Autos estamos para servirte.
	<br/>
	Para garantizar la entrega de tu carro el día {{ date('d/m/Y h:i A', strtotime($prestamo->horario_rsv)) }}, necesitamos que realices el pago de ${{ $total }}
	<br/>
	Las opciones de pago que existen en este momento son:
</p>
<ul>
	<li>Tarjeta de Crédito</li>
	<li>Efectivo</li>
</ul>
<p>Cuando hallas realizado el pago envías la confirmación de pago a nuestro correo.</p>