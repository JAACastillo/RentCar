<?php
	Route::get('tipo/',            [ 'as' => 'modelos',	       'uses' => 'TipoController@lista']);
    
	Route::post('tipo/store/',     [	                       'uses' => 'TipoController@store']);
	Route::get('tipo/{id}/edit/',  [ 'as' => 'tipoEditar',	   'uses' => 'TipoController@edit'	]);
	Route::get('tipo/update/{id}', [                           'uses' => 'TipoController@update'	]);