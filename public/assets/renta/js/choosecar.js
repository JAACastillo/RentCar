
angular.module('chooseCar', ['renta'])

.controller('chooseCarController', ['chooseCarService', 'reservaService', '$log', '$scope', '$window', function (chooseCarService, reservaService, $log, $scope, $window){
	$scope.carros = [];
	$log.info('controlere')
	
	function search(){
		fechas = reservaService.get();
			chooseCarService.all(fechas, 1).then(function (data){
			$scope.carros = data['data'];
			// $log.info(data);
		})
	}
	$scope.seleccionar = function (carro){
		chooseCarService.set(carro);
		$window.location.href = 'choose-extras';

	}
	search();
}])

.factory('chooseCarService', ['$q', '$log', '$http', 'reservaService', function ($q, $log, $http, reservaService) {

	function all(fechas, page){
		$log.info('service')
		defer = $q.defer();
		$http.get('cars/'+ fechas.fechaReserva.replace(/\//gi, '-') +'/'+ fechas.fechaDevolucion.replace(/\//gi, '-') +'?page=' + page)
		.success( function (data){
			defer.resolve(data);
		})
		.error (function (data){
			defer.reject();
		})
		return defer.promise;
	}

	function set(carro){
		reserva = reservaService.get();
		reserva.carro = carro;
		reservaService.set(reserva);
		$log.info(reserva)
		return true;
	}

	function byId(){

	}

	return {
		all 	: all,
		byId 	: byId,
		set 	: set
	}
}])