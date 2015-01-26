<div id="content" class="sidebar-middle" ng-controller="extraController">
	<div class="loading" ng-show="loading"  style="text-align:center"> <img src="{{url('assets/images/loading.gif')}}" width="200px"> </div>
		<div class="widget main-widget product-widget main-widget-3column">
			<div class="widget-title">
				<div>
					<img src="images/list.png" alt="" />
					Extras disponibles
				</div>
				<a href="{{route('revisar')}}"  class="pullRight btnOrange" style="color:#ffffff" type="submit" > Continuar </a>
				<div class="clear"></div>	
			</div>
			<div  ng-repeat="extra in extras">
				<div class="post" ng-class="{last_child:$last}">
					<div class="checkbox-block_container">
						<div class="main-block_container">
							<div class="additional-block_container">
								<div class="checkbox-block">
									<!-- <input type="checkbox" class="styled" name="checkbox_extras" value="1" /> -->
									<a href="" ng-click="add(extra)" style="padding: 8px;
																			background-color: #E4DBCC;
																			border: solid 1px rgba(158, 152, 152, 0.79);
																			border-radius: 5px;
																			color: #230D0D;"	> 
										Add
									</a>
								</div>
								<div class="main-block">									
									<div class="product-img">
										<img class="img-responsive" ng-src="assets/img/@{{extra.imagen}}" alt="foto del accesorio" width="80px" />
									</div>
									<div class="product-info">
										<h3 class="entry-format" ng-bind="extra.nombre"></h3>
										<div ng-bind="extra.descripcion"></div>
									
									</div>							
										
								</div>
								<div class="additional-block">
									<p ng-bind="extra.precio | currency"></p>
								</div>
							</div>									
						</div>
					</div>
					<div class="clear"></div>
				</div>	
			</div>				
		</div>
</div>