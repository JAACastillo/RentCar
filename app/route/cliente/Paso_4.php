<?php
    require __DIR__.'/../../controllers/cliente/clientePaso_4Controller.php';


    //Nuevas rutas para el paso 4

    Route::get('cliente/{id}/informacion',      ['as' => 'clienteInformacion', 'uses' => 'clientePaso_4Controller@verDocumentos']);
    Route::post('cliente/{id}/informacion',     ['as' => 'guardarDocumento', 'uses' => 'clientePaso_4Controller@saveDocumento']);
    Route::get('cliente/documento/{id}/editar', ['as' => 'editarDocumento', 'uses' => 'clientePaso_4Controller@editDocumento']);
    Route::patch('cliente/{id}/informacion',    ['as' => 'guardarDocumento', 'uses' => 'clientePaso_4Controller@updateDocumento']);
    
    Route::get('cliente/{id}/show/',            ['as' => 'clienteShow',  			'uses' => 'clientePaso_1Controller@show'  ]);
    Route::get('cliente/documento/{id}',		['as' => 'clienteDocumentoImagen',	'uses' => 'clientePaso_4Controller@mostrarImagen' ]);























