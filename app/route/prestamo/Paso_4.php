<?php
    Route::get('prestamo/{id}/pago',['as' => 'formaPago', 'uses' => 'prestamoPaso_4Controller@pago' ]);
    Route::get('prestamo/{id}/precioStore',['as' => 'precioStore','uses' => 'prestamoPaso_4Controller@store' ]);


    //los demas pasos estan de aqui para abajo


    Route::get('prestamo/{id}/contrato', 			['as' => 'prestamoContrato', 		 'uses' => 'prestamosController@contrato']);
    Route::post('prestamo/{id}/contrato', 			['as' => 'prestamoContrato', 		 'uses' => 'prestamosController@contratoSave']);
    Route::get('prestamo/{id}/contrato-imprimir',	['as' => 'prestamoContratoImprimir', 'uses' => 'prestamosController@contratoImprimir']);
    Route::get('prestamo/{id}/pagare',				['as' => 'prestamoPagare', 			 'uses' => 'prestamosController@pagare']);


    Route::get('prestamo/{id}/recibir',		['as' => 'prestamoRecibir', 	'uses' =>'prestamosController@recibir']);
    Route::get('prestamo/{id}/recibido',	['as' => 'prestamoRecibido', 	'uses' => 'prestamosController@recibido']);