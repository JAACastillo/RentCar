<?php

Route::get('carros', 				['as' => 'carros', 			'uses' => 'CarroController@index']);
Route::get('carro/nuevo', 			['as' => 'carroNuevo', 		'uses' => 'CarroController@nuevo']);
Route::post('carro/nuevo', 			['as' => 'carroGuardar', 	'uses' => 'CarroController@guardar']);
Route::get('carro/{id}/editar',		['as' => 'carroEditar',		'uses' => 'CarroController@editar']);
Route::patch('carro/{id}/editar',	['as' => 'carroUpdate',		'uses' => 'CarroController@update']);




Route::get('carro/{id}/placas',		['as' => 'carroPlacas',		'uses' => 'PlacasController@index']);
Route::post('carro/{id}/placas',	['as' => 'placaGuardar',	'uses' => 'PlacasController@guardar']);
Route::get('carro/placa/{id}',		['as' => 'placaEditar',		'uses' => 'PlacasController@editar']);
Route::patch('carro/placa/{id}',	['as' => 'placaUpdate',		'uses' => 'PlacasController@update']);
Route::delete('carro/placa/{id}',	['as' => 'placaDestroy',	'uses' => 'PlacasController@destroy']);






Route::get('carro/{id}/precios',	['as' => 'carroPrecios',	'uses' => 'PrecioController@index']);
Route::post('carro/{id}/precio',	['as' => 'precioGuardar',	'uses' => 'PrecioController@guardar']);
Route::get('carro/{id}/precio',		['as' => 'precioEditar',	'uses' => 'PrecioController@editar']);
Route::patch('carro/{id}/precio',	['as' => 'precioUpdate',	'uses' => 'PrecioController@update']);


Route::get('carro/{id}/mantenimiento',	['as' => 'carroManto',	'uses' => 'CarroController@manto']);
Route::post('carro/mantenimiento/save', ['as' => 'mantoSave',	'uses' => 'CarroController@mantoSave']);

//AngularJs get mantenimientos // http://localhost:8000/admin/carro/6/mantenimientos/5

Route::get('carro/{id}/mantenimientos/{idd}', function($idCarro, $id){
	$mantos = mantenimiento::with('tipo')->where('placa_id', $id)->get();
	return Response::json($mantos, 200);
});

// carro/5/modelos/1
// Route::get('carro/{idCarro}/modelos/{id}', function($carro, $marca){
Route::get('carro/modelos/{id}', function($marca){
	$modelos = Modelo::where('marca_id', "=" ,$marca)->get();
	return Response::json($modelos,200);
});
Route::get('carro/{dd}/modelos/{id}', function($dd, $marca){
	$modelos = Modelo::where('marca_id', "=" ,$marca)->get();
	return Response::json($modelos,200);
});