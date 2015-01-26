var app = angular.module('renta', ['ui.bootstrap'])

app.controller('reservaController', ['reservaService', '$log', '$scope', '$rootScope', 'getService', '$window', 
				function (reservaService, $log, $scope, $rootScope, getService, $window){

	$scope.edit = true;
	$scope.book = function (){
		$scope.reserva.fechaReserva = $('#fechaReserva').val(); //cambiar por fecha del dia
		$scope.reserva.fechaDevolucion = $('#fechaDevolucion').val(); //cambiar por fecha del dia + 1 dia
		$scope.reserva.lugarEntrega = $('#lugarEntrega').val();
		$scope.reserva.lugarDevolucion = $('#lugarDevolucion').val();
		$scope.reserva.extras = $scope.reserva.extras || [];
		reservaService.set($scope.reserva);
	}

	 function restaFechas(f1,f2)
	 {	
	 	$log.info('restarFechas')
		fFecha1 = timeStamp(f1);
		fFecha2 = timeStamp(f2);
		var dif = (fFecha2 - fFecha1) / (1000 * 60 * 60);
		
		var dias = Math.floor(dif / 24); 
		if(dif % 24)
			dias++;
		return dias;
	 }

	 function timeStamp(fecha){ //devuelve el timestamp para luego hacer el calculo de las horas que han transcurrido
	 	fecha = fecha.split('-')
	 	$log.info(fecha)
	 	horas = fecha[3].split(':')
	 	// fechas = fecha[0].split('/');
	 	return Date.UTC(fecha[2],fecha[1],fecha[0],horas[0]);
	 }

	
		 $scope.reserva = reservaService.get();
	if($scope.reserva.carro){
		 $scope.reserva.dias = restaFechas($scope.reserva.fechaReserva.replace(' ', '-'), $scope.reserva.fechaDevolucion.replace(' ', '-'));
		 $scope.reserva.totalCarro = $scope.reserva.dias * $scope.reserva.carro.precio;
		 calcularTotal()
	}

	function calcularTotal(){
		$scope.reserva.total = $scope.reserva.totalCarro;
		if($scope.reserva.extras){
			$scope.reserva.extras.forEach(function (extra){
				if(extra.cobro)
					$scope.reserva.total += (extra.precio)
				else 
					$scope.reserva.total += (extra.precio * $scope.reserva.dias)
			})
		}
		return true;
	}
	$rootScope.$on('addExtra', function(event, extra){
		$scope.reserva.extras = $scope.reserva.extras || [];
		$scope.reserva.extras.push(extra);// = $scope.reserva.extras.concat(newRoleArray);
		reservaService.set($scope.reserva);
		calcularTotal()
	})
	$scope.remove = function (index){
		$scope.reserva.extras.splice(index, 1);
		reservaService.set($scope.reserva);
		calcularTotal();
		// $log.info($scope.reserva)
	}

	$scope.update = function(){
		$scope.book()
		$rootScope.$emit('updateCarro')
	}


	$scope.administrarReserva = function(){
		getService.post('administrar', $scope.reservas).then(function (data){
			// $log.info(data);
			$window.localStorage['confirmacionReserva'] = JSON.stringify(data);
			$window.location = "/confirmacion";
		},
		function(data){
			$log.info(data)
		})
	}

}])

app.factory('reservaService', ['$window', '$log', function ($window, $log){
	function get(lugar = "fechaReserva"){
		return JSON.parse($window.localStorage[lugar] || defecto());
	}

	function defecto()
	{	now = new Date();
		today  = now.getDay() + "-" + (now.getMonth() + 1) + "-" + now.getFullYear() + " " + now.getHours() + ":" + now.getMinutes();
		tomorrow = today;
		$log.info($('#fechaReserva').val());
		return '{"lugarEntrega" : 1,"lugarDevolucion" : 1	}';
		// return "{}"
	}

	function set(reserva){
		$window.localStorage['fechaReserva'] = JSON.stringify(reserva)
	}
	return {
		get : get,
		set : set
	}
}])


.controller('chooseCarController', ['chooseCarService', 'reservaService', 'getService', '$log', '$scope', '$window', '$rootScope', '$timeout', function (chooseCarService, reservaService, getService, $log, $scope, $window, $rootScope, $timeout){
	$scope.carros = [];
	$scope.predicate 	= 'precio';
	$scope.reverse 		= false;
	$scope.marcas 		= []
	// $scope.currentPage = 1;

	function search(pageNo){
		$scope.reserva = reservaService.get();
	if($scope.reserva.fechaReserva){
		$scope.loading = true;
		$timeout(function(){
			$scope.currentPage = pageNo;
			chooseCarService.all($scope.reserva, pageNo).then(function (data){
				$scope.totalItems 	= data['total'];
				$scope.perPage 		= data['per_page'];
				$scope.to 			= data['to'];
				$log.info(data)
				$scope.carros = data['data'];
				$scope.loading = false;
				// getService.all('marcacount').then(function (marcas){
				// 	$scope.marcas = marcas;
				// })
			})
		}, 10);
	}
	
	}


	$scope.setPage = function (pageNo) {
		$scope.currentPage = pageNo;
	};

	$scope.pageChanged = function() {
		search($scope.currentPage)
	};

	$scope.seleccionar = function (carro){
		chooseCarService.set(carro);
		$window.location.href = 'choose-extras';

	}
	$scope.filterAlreadyAdded = function(arrayName) {
        var array = $parse(arrayName)($scope);
        console.log(array);
        return function(item) {
            return (array.indexOf(item) == -1);
        }
    };
    $scope.marcasFilter = function(array) {
        // var array = $parse(arrayName)($scope);
        console.log(array);
        return function(item) {
            return (array.indexOf(item) == -1);
        }
    };
	search(1);


	//para actualizar
	$rootScope.$on('updateCarro', function (event){ search(1) })

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


.controller('extraController', 	 ['getService', 'reservaService', '$scope', '$log','$rootScope','$timeout', 
						function (extraService, reservaService, $scope, $log, $rootScope, $timeout)
{
	$scope.loading = true;
	$timeout(function() {
		extraService.all('extras').then(function(data){
			$scope.extras = data['data'];
		})
		$scope.loading = false;
	}, 2000);
	
	$scope.add = function (extra){ 
    	$rootScope.$emit('addExtra', extra);
	}
}])
.factory('getService', ['$http', '$q', function ($http, $q){
	function all(url){
		defer = $q.defer();
		$http.get(url)
		.success( function (data){
			defer.resolve(data);
		})
		.error( function (data){
			defer.reject(data);
		})
		return defer.promise;
	}

	function post(url, data){
		defer = $q.defer();
		$http.post(url, data)
		.success( function (data){
			defer.resolve(data);
		})
		.error( function (data){
			defer.reject(data);
		})
		return defer.promise;
	}

	return {
		all : all,
		post : post
	}
}])


.controller('revisarController', ['getService', '$scope', '$timeout', 'reservaService','$window', '$log', function (getService, $scope, $timeout, reservaService, $window, $log){
	getService.all('user').then(function (user){
		$scope.user = user;
	})
	reserva = reservaService.get(); //obteniendo datos de reserva
	if(! reserva.carro){
		$timeout(function(){
			$window.location = 'choose-car';
		}, 2000)
	}

	$scope.guardar = function(){
		reserva.usuario = {};
		reserva.usuario.nombre 		= $scope.user.nombre;
		reserva.usuario.email 		= $scope.user.email;	
		reserva.usuario.telefono 	= $scope.user.telefono;
		// $log.info(reserva)
		getService.post('guardar', reserva).then(function (data){
			// $log.info(data)
			// reservaService.set('')
			$window.localStorage.removeItem("fechaReserva");
			$window.localStorage['confirmacionReserva'] = JSON.stringify(reserva);
			$window.location = "/confirmacion";
		});
	}
}])

.controller('loginController', ['getService', '$scope', '$log', '$window', function (getService, $scope, $log, $window){
	$scope.user 		= {
		'email' 	: 'rsanabria@hotmail.es',
		'password'	: ''
	};
	$scope.registerUser = {
		'nombre'	: 'Lando',
		'email'	    : 'rsanabria.unicaes@gmail.com'
	};

	$scope.iniciarSesion = function (){
		getService.post('/entrar',$scope.user).then( function (data){
			$window.location  = "/";
		}, function (data){
			$scope.error = data;
			//aqui hay que mostrar los errores cuando lo halla.
		})
	}

	$scope.registrar = function (){
		$log.info('registrando')
		getService.post('registrar', $scope.registerUser).then( function (data){
			$window.location = '/'
			// $log.info(data)
		},function (data){
			$log.info(data)
			$scope.errores = data;
			//mostrar errores aqui.
		})
	}
}])
.controller('confirmationController', ['$window', '$scope', 'reservaService', '$log', function ($window, $scope, reservaService, $log){
	$scope.reserva = reservaService.get('confirmacionReserva');
	$scope.edit = false;
}])



