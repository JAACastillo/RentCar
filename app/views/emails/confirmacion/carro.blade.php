
<h4  ng-show="reserva.carro">
	Carro 		
	 <span> ({{$prestamo->dias}} días )</span>
</h4>
<div class="widget-content main-block product-widget-mini"  ng-show="reserva.carro">								
	<div class="product-img">
		<img src="http://placehold.it/105x55" alt="" />
	</div>
	<div class="product-info">
		<div class="entry-format">
			{{$prestamo->carro->modelo->marca->nombre}}
			<span > {{$prestamo->carro->modelo->nombre; $prestamo->carro}}</span>
			
		</div>
		<div class="features">

			<p></span><img src="images/passenger-icon.png" alt="" />{{$prestamo->carro->capacidad}}</p>
			<p ><img src="images/suitcase-icon.png" alt=""/> {{$prestamo->carro->equipamiento}}</p>
			<p> <img src="images/transmission-icon.png" alt="" /> {{$prestamo->carro->transmision}} </p>
			<p><img src="images/air-icon.png" alt="" /> aire acondicionado </p>
			<p ><img src="images/km_l-icon.png" alt="" /> {{$prestamo->carro->kmGalon}} km/l</p>						
		</div>
	</div>
	</div>

<div class="subtotal_content"  ng-show="reserva.carro">
	<div class="subtotal">				
		Subtotal: $ {{$prestamo->totalCarro}}
	</div>
</div>