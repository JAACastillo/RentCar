
	<h4  ng-show="reserva.carro">
		Carro 
		
		 <span ng-bind="reserva.carro.precio | currency"></span> @ <span ng-bind="reserva.dias"> </span> dias
		<a href="{{route('chooseCar')}}" ng-show="edit" title="">Edit</a>
	</h4>
	<div class="widget-content main-block product-widget-mini"  ng-show="reserva.carro">								
		<div class="product-img">
			<!-- <img src="http://placehold.it/105x55" alt="" /> -->
			<img src="" ng-src="assets/images/carros/@{{reserva.carro.imagen}}" alt="" width="105px" height="55px" />
		</div>
		<div class="product-info">
			<div class="entry-format">
				<div ng-bind="reserva.carro.marca"></div>
				<span ng-bind="reserva.carro.modelo"></span>
				<span ng-bind="reserva.carro.ano"></span>
			</div>
			<div class="features">

				<p></span><img src="images/passenger-icon.png" alt="" /> <span  ng-bind="reserva.carro.capacidad"></p>
				<p ><img src="images/suitcase-icon.png" alt=""/> <span ng-bind="reserva.carro.equipamiento"></span></p>
				<p> <img src="images/transmission-icon.png" alt="" /> <span ng-bind="reserva.carro.transmision"></span> </p>
				<p><img src="images/air-icon.png" alt="" /> aire acondicionado </p>
				<p ><img src="images/km_l-icon.png" alt="" /> <span ng-bind="reserva.carro.kmGalon"> </span> km/l</p>						
			</div>
		</div>
		</div>

	<div class="subtotal_content"  ng-show="reserva.carro">
		<div class="subtotal">				
			Subtotal: <span class="price" ng-bind=" reserva.totalCarro | currency"></span>
		</div>
	</div>
