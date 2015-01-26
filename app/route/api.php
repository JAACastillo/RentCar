<?php
use Carbon\Carbon;

Route::get('api/mantenimientos/{id}', ['as' => 'mantenimientoVer', 'uses' => function($id){
	// $mantos = [array(
	// 	'tipo' => 'Nada',
	// 	'fecha' => '12/12/2014'//Carbon::now()->yesterday()
	// 	),
	// ];
	$mantos = mantenimiento::with('tipo')->where('placa_id', $id)->get();

	// foreach ($mantos as $manto) {
	// $mant[]['fecha'] = $manto->fecha;
	// $mant[]['tipo'] = $manto->tipo->nombre;
	// }

	return Response::json($mantos, 200);
}]);



Route::get('eventos', 'calendarioController@eventos');