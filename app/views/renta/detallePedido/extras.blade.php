
<h4 class="extras"  ng-show="reserva.extras">Extras
	<a href="{{route('extras')}}" ng-show="edit" title="">Edit</a>
</h4>
<div class="widget-content widget-extras" ng-repeat="extra in reserva.extras track by $index" style="position:relative">	
	<a href="" ng-show="edit" ng-click="remove($index)" style="   				position: absolute;
															    right: 0px;
															    top: 0px;
															    padding: 0px 3px;
															    background-color: rgb(252, 211, 211);
															    color: rgb(174, 53, 53);
															    font-size: smaller;">
		X
		</a>							
	<p ><span ng-bind="extra.nombre"></span> <span class="price" ng-bind="extra.precio | currency"></span></p>
</div>

