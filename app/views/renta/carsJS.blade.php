<div style="display:relative">

	<div class="loading" ng-show="loading"  style="text-align:center"> <img src="{{url('assets/images/loading.gif')}}" width="200px"> </div>
	<div class="widget-title">
		<div>
			<img src="images/list.png" alt="" />
			Resultados <span>( <i ng-bind="to"></i> de <i ng-bind="totalItems"></i>)</span>
		</div>
		<div class="widget-title-sort"><span class="viev-all">Ordenar por: </span> 
			<a href="" title=""  ng-click="predicate = 'precio'; reverse=!reverse">Precio</a> | 
			<a href="" title="" ng-click="predicate = 'marca'; reverse=!reverse">Marca</a>
		</div>
		<div class="clear"></div>	
	</div>
		<div class="post"  ng-class="{$last:last_child}" ng-repeat="carro in carros | orderBy:predicate:reverse ">
			<div class="main-block_container">
				<div class="additional-block_container">
					<div class="main-block">									
						<div class="product-img">
							<!-- <img src="http://placehold.it/150x75" alt="" /> -->
							<img src="" ng-src="assets/images/carros/@{{carro.imagen}}" alt="" width="150px" height="75px" />
						</div>
						<div class="product-info">
							<h3 class="entry-format">@{{carro.marca}} <span>|  @{{carro.modelo}}</span> 
								<!-- <span class="top-seller">Top Seller</span> -->
							</h3>
							<div class="features">
								<p><img src="images/passenger-icon.png" alt="" /> @{{carro.capacidad}} pasajeros</p>
								<p><img src="images/suitcase-icon.png" alt="" /> @{{carro.equipamiento}}</p>
								<p><img src="images/transmission-icon.png" alt="" /> @{{carro.transmision}}</p>
								<p><img src="images/air-icon.png" alt="" /> aire acondicionado</p>
								<p><img src="images/km_l-icon.png" alt="" /> @{{carro.kmGalon}} km/l</p>						
							</div>
							<!-- <div class="details">
								<div class="view-details">[+] Ver detalles</div>
								<div class="close-details">[-] Ocultar detalles</div>
								<ul class="details-more">
									<li>6-speaker radio/CD system</li>
									<li>Escaro black fabric</li>
									<li>Hybrid System display</li>
									<li>Vehicle Stability Control</li>
									<li>Hill-start Assist Control</li>										
								</ul>
							</div> -->
						</div>								
					</div>
					<div class="additional-block">
						<p ng-bind="carro.precio | currency"> </p>
						<p class="span">Millas ilimitadas incluidas</p>
						<input class="continue_button blue_button" type="submit" value="Seleccionar" ng-click='seleccionar(carro)' />
					</div>
				</div>									
			</div>
			<div class="clear"></div>
		</div>
</div>	