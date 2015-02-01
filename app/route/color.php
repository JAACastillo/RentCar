<?php
	Route::get('color',            	[ 'as' => 'colores',	       'uses' => 'ColorController@lista']);

    Route::get('color/nuevo',		['as' => 'colorNuevo',		'uses' => 'ColorController@nuevo']);
	Route::post('color/nuevo',     	[	                       	'uses' => 'ColorController@store']);
	Route::get('color/{id}/editar', [ 'as' => 'colorEditar',	   'uses' => 'ColorController@edit'	]);
	Route::post('color/{id}/editar', [                           'uses' => 'ColorController@update'	]);