

var app = angular.module('search', ['ui.bootstrap', 'chart.js'])

.controller('searchController', ['$scope','searchService', '$window', function($scope, searchService, $window){
	$scope.search = undefined;
	$scope.getSearch = function (query){
		results = searchService.get(query);
		return results;
		return results.map(function(item){
			return item;
		})
	}

	$scope.onSelect = function (item, model, label){
		$window.location = item.ruta;
	}
}])

.factory('searchService', ['$http', '$q', function ($http, $q){
	function get(query){
		defer = $q.defer();
		$http.get('/admin/search/' + query)
		.success(function (data){
			defer.resolve(data);
		})
		.error (function(data){
			defer.reject(data);
		})

		return defer.promise
	}
	return {
		get : get
	}
}])

.controller('mantoController', ['factory', '$log', '$scope', function(factory, $log, $scope){
    $scope.mantos = function (){
        $scope.mantenimientos = [];
        if($scope.placa){
            factory.all($scope.placa, "mantenimientos/").then(
                function (data){
                    $log.info(data)
                    $scope.mantenimientos = data;
                },
                function (data){
                    $log.info('error')
                }
            )
        }
    }

    $scope.details = function (mantenimiento){
    	// $log.info(index);
    	$scope.detalles = mantenimiento;//$scope.mantenimientos[index];
    }
}])
.factory('factory', ['$q', '$http', '$log', function($q, $http, $log){
    function all(id, url){
        defer = $q.defer();
        $http.get(url + id)
        .success(function (data){
            defer.resolve(data);
        })
        .error( function (data){
            defer.reject(data);
        })
        return defer.promise;
    }

    function post(data, url){
    	defer = $q.defer();
    	$http.post(url, data)
    		.success(function(data){
    			defer.resolve(data);
    		})
    		.error(function(data){
    			defer.reject(data);
    		})
    	return defer.promise;
    }

    return {
        all 	: all,
        post	: post
    }
}])


.controller('carroController', ['$scope', 'factory','$log', function($scope, factory, $log){
	// $scope.modeloId = $('#modelo_id').val();
	$scope.marca 	= $("#marca_id").val();

	$scope.getModelos = function(){
		// marca = $('#marca_id').val();
		$log.info('modelos');
	    factory.all($scope.marca, "modelos/").then(
	        function (data){
	        	// $scope.modeloId = $('#modelo_id').val();
	            $log.info(data)
	            $scope.modelos = data;
	        }
	        ,
	        function (data){
	            $log.info('error')
	    	}
	    )
	}

	$scope.getModelos();
	// $scope.modeloId = $('#modelo_id').val();
}])

.controller('reservaController', ['factory', '$log', '$scope', function(factory, $log, $scope){
	
	$scope.graficas = ['Line', 'Bar', 'Pie', 'Doughnut']
	$scope.type = 'Line';
	$scope.grafica = 0;
	$scope.groupBy = 'del';
	$scope.options = {
		inGraphDataShow : true,
   		inGraphDataTmpl : "<%=v6+'%'%>"
	}


	datas = [];
	$scope.labels = [];
	// $scope.series = ['Series A', 'Series B'];
	$scope.data = [
	    // [65, 59, 80, 81, 56, 55, 40],
	    // [28, 48, 40, 19, 86, 27, 90],
	    // [28, 48, 40, 19, 86, 27, 90]
	];

	// $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
 //    $scope.data = [300, 500, 100, 40, 120];
 //    $scope.type = 'PolarArea';

    $scope.toggle = function () {
      // $scope.type = $scope.type === 'PolarArea' ?
      //   'Pie' : 'PolarArea';
      	

      	// $log.info($scope.data)
      	grafica()
    };



	$scope.onClick = function (points, evt) {
	    console.log(points, evt);
	};

	function grafica(){
	 	// datos = alasql('SELECT ? as label, SUM([cantidad]) as total FROM ? group by ?',['modelo'],[$scope.reservas, ], ['modelo'])
	 	// if($scope.reservas){
		 	datos = alasql('SELECT '+ $scope.groupBy +' as label, SUM([cantidad]) as total FROM ? group by '+ $scope.groupBy,[ $scope.reservas])

		 	labels = []; 	datas = [];
		 	datos.forEach(function(item){
		 		labels.push(item.label);
		 		datas.push(item.total);
		 	})
			$scope.type = $scope.graficas[$scope.grafica];
	      	if($scope.grafica > 1)
	      		$scope.data = datas;
	      	else
	      		$scope.data = [datas]
		 	// $log.info(datas)
		 	// $scope.data = [datas];
		 	$scope.labels = labels;
		 	// $log.info($scope.data)
	 	// }
	}
	function resumen(){
		total 		= alasql('SELECT SUM([cantidad]) as cantidad FROM ?',[$scope.reservas])
	 	clientes 	= alasql('SELECT COUNT([cliente]) as cantidad FROM ? group by cliente',[$scope.reservas])
	 	modelos 	= alasql('SELECT COUNT([*]) as cantidad FROM ? group by modelo',[$scope.reservas])
	 	placas 		= alasql('SELECT COUNT([placa]) as cantidad FROM ? group by placa',[$scope.reservas])
	 	tipos 		= alasql('SELECT COUNT([tipo]) as cantidad FROM ? group by tipo',[$scope.reservas])
	 	marcas 		= alasql('SELECT COUNT([marca]) as cantidad FROM ? group by marca',[$scope.reservas])
	 	
	 	$log.info(marcas);

	 	$scope.total 	= total[0].cantidad;
	 	$scope.clientes = clientes.length;//cantidad(clientes);
	 	$scope.modelos 	= modelos.length;//cantidad(modelos);
	 	$scope.placas 	= placas.length;//cantidad(placas);
	 	$scope.tipos 	= tipos.length;//cantidad(placas);
	 	$scope.marcas 	= marcas.length;//cantidad(placas);
	}

	$scope.obtener = function(){
		// console.log('horla ')
		 // $log.info($('#reportrange').startDate.format('MMMM D, YYYY') )
		 data = {}
		 data.del = $('#start').val();
		 data.al = $('#end').val();
		 factory.post(data, '/admin/reportes/reservas').then(function(data){
		 	$scope.reservas = data;
		 	grafica();
		 	resumen();
		 },
		 function(data){
		 	$scope.reservas = [];
		 	$log.info('error');
		 })
	}

	$scope.excel = function (){
		alasql('SELECT modelo, placa, proveedor, cliente, del, al, duracion as dias, cantidad as total   INTO XLSX("informe de reservas.xlsx",{headers:true}) FROM ?',[$scope.reservas]);
		// $scope.datos = alasql('SELECT del, SUM(cantidad) as total FROM ? group by del',[$scope.reservas]);
	}

}])

