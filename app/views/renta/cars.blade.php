<form action="05-choose-extras.html">
	<div class="widget-title">
		<div>
			<img src="images/list.png" alt="" />
			Results <span>(10 from 24)</span>
		</div>
		<div class="widget-title-sort"><span class="viev-all">Sort by: </span> <a href="#" title="" class="current">Price</a> | <a href="#" title="">Type</a></div>
		<div class="clear"></div>	
	</div>

	@foreach($carros as $carro)
		<div class="post">
			<div class="main-block_container">
				<div class="additional-block_container">
					<div class="main-block">									
						<div class="product-img">
							<img src="http://placehold.it/150x75" alt="" />
						</div>
						<div class="product-info">
							<h3 class="entry-format">{{$carro->marca}} <span>|  {{$carro->modelo}}</span> <span class="top-seller">Top Seller</span></h3>
							<div class="features">
								<p><img src="images/passenger-icon.png" alt="" /> {{$carro->capacidad}} pasajeros</p>
								<p><img src="images/suitcase-icon.png" alt="" /> {{$carro->equipamiento}}</p>
								<p><img src="images/transmission-icon.png" alt="" /> {{$carro->transmision}}</p>
								<p><img src="images/air-icon.png" alt="" /> aire acondicionado</p>
								<p><img src="images/km_l-icon.png" alt="" /> {{$carro->kmGalon}} km/l</p>						
							</div>
							<div class="details">
								<div class="view-details">[+] Ver detalles</div>
								<div class="close-details">[-] Ocultar detalles</div>
								<ul class="details-more">
									<li>6-speaker radio/CD system</li>
									<li>Escaro black fabric</li>
									<li>Hybrid System display</li>
									<li>Vehicle Stability Control</li>
									<li>Hill-start Assist Control</li>										
								</ul>
							</div>
						</div>								
					</div>
					<div class="additional-block">
						<p>$ {{$carro->precio}}</p>
						<p class="span">Millas ilimitadas incluidas</p>
						<input class="continue_button blue_button" type="submit" value="Seleccionar" />
					</div>
				</div>									
			</div>
			<div class="clear"></div>
		</div>
	@endforeach
	
	<!-- <div class="post">
		<div class="main-block_container">
			<div class="additional-block_container">
				<div class="main-block">									
					<div class="product-img">
						<img src="http://placehold.it/155x75" alt="" />
					</div>
					<div class="product-info">
						<h3 class="entry-format">Chevy Aveo <span>|  Compact</span></h3>
						<div class="features">
							<p><img src="images/passenger-icon.png" alt="" /> 5 passengers</p>
							<p><img src="images/suitcase-icon.png" alt="" /> 1 large suitcases, 1 small suitcase</p>
							<p><img src="images/transmission-icon.png" alt="" /> automatic transmission</p>
							<p><img src="images/air-icon.png" alt="" /> air conditioning</p>
							<p><img src="images/km_l-icon.png" alt="" /> 13 km/l</p>						
						</div>
						<div class="details">
							<div class="view-details">[+] View car details</div>
							<div class="close-details">[-] Close car details</div>
							<ul class="details-more">
								<li>6-speaker radio/CD system</li>
								<li>Escaro black fabric</li>
								<li>Hybrid System display</li>
								<li>Vehicle Stability Control</li>
								<li>Hill-start Assist Control</li>										
							</ul>
						</div>
					</div>								
				</div>
				<div class="additional-block">
					<p>$360.99</p>
					<p class="span">Unlimited free miles included</p>
					<input class="continue_button blue_button" type="submit" value="Select" />
				</div>
			</div>								
		</div>
		<div class="clear"></div>
	</div>
	<div class="post last_child">
		<div class="main-block_container">
			<div class="additional-block_container">
				<div class="main-block">									
					<div class="product-img">
						<img src="http://placehold.it/155x75" alt="" />
					</div>
					<div class="product-info">
						<h3 class="entry-format">Toyota Corolla <span>|  Intermediate</span></h3>
						<div class="features">
							<p><img src="images/passenger-icon.png" alt="" /> 5 passengers</p>
							<p><img src="images/suitcase-icon.png" alt="" /> 2 large suitcases, 1 small suitcase</p>
							<p><img src="images/transmission-icon.png" alt="" /> automatic transmission</p>
							<p><img src="images/air-icon.png" alt="" /> air conditioning</p>
							<p><img src="images/km_l-icon.png" alt="" /> 14 km/l</p>						
						</div>
						<div class="details">
							<div class="view-details">[+] View car details</div>
							<div class="close-details">[-] Close car details</div>
							<ul class="details-more">
								<li>6-speaker radio/CD system</li>
								<li>Escaro black fabric</li>
								<li>Hybrid System display</li>
								<li>Vehicle Stability Control</li>
								<li>Hill-start Assist Control</li>										
							</ul>
						</div>
					</div>								
				</div>
				<div class="additional-block">
					$845.25
					<p class="span">Unlimited free miles included</p>
					<input class="continue_button blue_button" type="submit" value="Select" />
				</div>
			</div>								
		</div>
		<div class="clear"></div>
	</div> -->
</form>	