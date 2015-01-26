<?php


Route::get('empresas', ['as' => 'empresas', 'uses' => 'EmpresaController@lista']);


Route::get('empresa/nuevo', 	['as' => 'empresaNuevo', 	'uses' => 'EmpresaController@nuevo']);
Route::post('empresa/save',		['as' => 'empresaSave', 	'uses' => 'EmpresaController@save']);

Route::get('empresa/{id}/editar', 	['as' => 'empresaEditar',	'uses' => 'EmpresaController@editar']);
Route::patch('empresa/{id}/update',		['as' => 'empresaUpdate',	'uses' => 'EmpresaController@update']);