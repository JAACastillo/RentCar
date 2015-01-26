<?php
	require __DIR__.'/../../controllers/cliente/clientePaso_2Controller.php';
    /**
     * [Subir Fotos del Cliente]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/contacto',[
		'as' => 'clienteContacto',
		'uses' => 'clientePaso_2Controller@contacto'
	]);
    /**
     * [Guardar Datos Del Contacto]
     * @return [vista] [cliente/foemularios/adicional]
     */
	Route::patch('cliente/{id}/contactoStore',[
		'as' => 'contactoStore',
		'uses' => 'clientePaso_2Controller@storage'
	]);
