<?php
   
	Route::get('marca',['as' => 'marcas', 'uses' => 'MarcaController@lista']);
    
	Route::post('marca/store/',['uses' => 'MarcaController@store'	]);
   
	Route::get('marca/{id}/edit',[		'as' => 'marcaEditar',		'uses' => 'MarcaController@edit'	]);
    
	Route::get('marca/update/{id}',[		'uses' => 'MarcaController@update'	]);
    
	Route::get('marca/show/{id}',[		'as' => 'marcaShow',		'uses' => 'MarcaController@show'	]);