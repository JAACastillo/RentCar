<?php
	require __DIR__.'/../../controllers/cliente/clientePaso_5Controller.php';
    /**
     * [Subir Fotos del Cliente]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/comentario',[
		'as' => 'clienteComentario',
		'uses' => 'clientePaso_5Controller@comentarios'
	]);

	Route::post('cliente/{id}/comentarioStore',[
		'as' => 'comentarioStore',
		'uses' => 'clientePaso_5Controller@storage'
	]);