<?php
	require __DIR__.'/../../controllers/modelo/modeloPaso_2Controller.php';
    /**
     * [Subir Fotos del Modelo]
     * @return [vista] [auto/modelos/fotos/form]
     */
    Route::get('modelo/{id}/subir',[
        'as' => 'modeloFoto',
        'uses' => 'modeloPaso_2Controller@subirFoto'

        ]);
    /**
     * [Guardar]
     * @return [vista] [auto/modelos/fotos/form]
     */
	Route::patch('modelo/{id}/modeloUpload',[
		'as' => 'modeloUpload',
		'uses' => 'modeloPaso_2Controller@upload'
	]);
    /**
     * [Cambiar Imagen]
     * @return [vista] [auto/modelos/fotos/form]
     */
    Route::get('modelo/{id}/change',[
        'as' => 'modeloChange',
        'uses' => 'modeloPaso_2Controller@change'
    ]);
    /**
     * [Reemplazar Imagen]
     * @return [vista] [auto/modelos/fotos/form]
     */
    Route::patch('modelo/{id}/reupload',[
        'as' => 'modeloReUpload',
        'uses' => 'modeloPaso_2Controller@reUpload'
    ]);
    /**
     * [Borrar Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('modelo/{id}/delete',[
        'as' => 'modeloDelete',
        'uses' => 'modeloPaso_2Controller@delete'
    ]);
    /**
     * [Mostrar Imagenes]
     * @return [type] [JSON]
     */
    Route::get('modelo/{id}/imagenes',[
        'as' => 'fotoShow',
        'uses' => 'modeloPaso_2Controller@showImg'
    ]);