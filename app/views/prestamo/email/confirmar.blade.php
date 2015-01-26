<h1>MultiAutos El Salvador</h1>
<h3>Tu reserva ha sido aprobada</h3>
<p>Hola {{ $prestamo->cliente->nombre }}</p>
<p>Tu reserva ha sido aprobada.</p>
<p>Para garantizar la entrega de tu carro el día {{ date('d-m-Y h:i A', strtotime($prestamo->horario_rsv)) }}, necesitamos que realices el pago de ${{ $total }}</p>
<p>Las opciones de pago que existen en este momento son: </p>
<ul>
	<li>Tarjeta de Crédito</li>
	<li>Efectivo</li>
</ul>
<p>Cuando hallas realizado el pago envías la confirmación de pago a nuestro correo.</p>