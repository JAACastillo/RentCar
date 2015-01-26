
<aside id="secondary" class="sidebar-left">	
	<div class="widget info_widget">
		<h3 class="widget-title">
			<img src="images/info.png" alt="" />
			Info
		</h3>
		<div class="widget-content"><strong>Please Note: </strong> The vehicles shown are examples. Specific models within a car class may vary in availability and features, such as passenger seating, luggage capacity and mileage.</div>
	</div>
	<div class="widget filter_widget">
		<h3 class="widget-title">
			<img src="images/filter_results.png" alt="" />
			Filtrar resultados
		</h3>
		<!-- <h4>Price range</h4>
		<div class="widget-content-range">								
			<input class="price_range" value="250;1000" name="price_range" />
		</div> -->
		<h4>Marcas</h4>
		<div class="widget-content widget-filter">	

			<div class="filter" ng-repeat='marca in marcas'>
				<input id="manufacturers_ford" type="checkbox" class="styled" name="manufacturers_ford" /> 
				<label for="manufacturers_ford" ng-bind="marca.nombre"></label> 
				<div class="filter_quantity" ng-bind='marca.cantidad'></div>
			</div>
			<!-- <div class="filter">
				<input id="manufacturers_reno" type="checkbox" class="styled" name="manufacturers_reno" value="1"/> 
				<label for="manufacturers_reno">Reno</label> 
				<div class="filter_quantity">3</div>
			</div>
			<div class="filter">
				<input id="manufacturers_toyota" type="checkbox" class="styled" name="manufacturers_toyota" value="1"/> 
				<label for="manufacturers_toyota">Toyota</label> 
				<div class="filter_quantity">1</div>
			</div>
			<div class="filter">
				<input id="manufacturers_chevrolet" type="checkbox" class="styled" name="manufacturers_chevrolet" value="1"/> 
				<label for="manufacturers_chevrolet">Chevrolet</label> 
				<div class="filter_quantity">1</div>
			</div>
			<div class="filter">
				<input id="manufacturers_bmw" type="checkbox" class="styled" name="manufacturers_bmw" value="1"/> 
				<label for="manufacturers_bmw">BMW</label> 
				<div class="filter_quantity">17</div>
			</div> -->
		</div>
		<!-- <h4>Number of passangers</h4>
		<div class="widget-content-range">								
			<input class="passangers_range" value="1;5" name="passangers_range" />
		</div> -->
		<h4>Tipo de Vehiculo</h4>
		<div class="widget-content widget-filter">
			<div class="filter">
				<input id="type_economy" type="checkbox" class="styled" name="type_economy" value="1"/> 
				<label for="type_economy">Economy</label> 
				<div class="filter_quantity">1</div>
			</div>
			<div class="filter">
				<input id="type_compact" type="checkbox" class="styled" name="type_compact" value="1"/> 
				<label for="type_compact">Compact</label> 
				<div class="filter_quantity">1</div>
			</div>
			<div class="filter">
				<input id="type_intermediate" type="checkbox" class="styled" name="type_intermediate" value="1"/> 
				<label for="type_intermediate">Intermediate</label> 
				<div class="filter_quantity">1</div>
			</div>
			<div class="filter">
				<input id="type_sport" type="checkbox" class="styled" name="type_sport" value="1"/> 
				<label for="type_sport">Sport</label> 
				<div class="filter_quantity">2</div>
			</div>
		</div>
	</div>															
</aside>	