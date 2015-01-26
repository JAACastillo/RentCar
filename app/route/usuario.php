<?php


Route::get('usuarios', 				['as' => 'usuarios', 		'uses' => 'UserController@index']);
Route::get('usuario/crear', 		['as' => 'usuarioNuevo', 	'uses' => 'UserController@create']);
Route::post('usuario/save',			['as' => 'usuarioSave',		'uses' => 'UserController@store']);


Route::get('usuario/{id}/editar', 		['as' => 'usuarioEditar', 		'uses' => 'UserController@edit']);
Route::patch('usuario/{id}/update',		['as' => 'usuarioUpdate',		'uses' => 'UserController@update']);



Route::get('usuarios/desactivar', 		['as' => 'usuarioDesactivar', 	'uses' => 'UserController@destroy']);