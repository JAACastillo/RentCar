<?php
	require __DIR__.'/../../controllers/cliente/clientePaso_3Controller.php';
    /**
     * [Subir Fotos del Cliente]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/adicional',[
		'as' => 'clienteAdicional',
		'uses' => 'clientePaso_3Controller@adicional'
	]);

	Route::patch('cliente/{id}/adicionalStore',[
		'as' => 'adicionalStore',
		'uses' => 'clientePaso_3Controller@storage'
	]);
 