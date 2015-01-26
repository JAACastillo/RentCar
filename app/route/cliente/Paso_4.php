<?php
    require __DIR__.'/../../controllers/cliente/clientePaso_4Controller.php';
    /**
     * [Subir Fotos del Cliente]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/subir',[
        'as' => 'clienteFoto',
        'uses' => 'clientePaso_4Controller@subirFoto'
    ]);
    /**
     * [Subir Multiples Imagenes]
     * @return [type]     [description]
     */
    Route::patch('cliente/{id}/upload',[
        'as' => 'clienteUpload',
        'uses' => 'clientePaso_4Controller@upload'
    ]);
    /**
     * [Cambiar Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/change',[
        'as' => 'clienteChange',
        'uses' => 'clientePaso_4Controller@change'
    ]);
    /**
     * [Reemplazar Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    Route::patch('cliente/{id}/reupload',[
        'as' => 'clienteReUpload',
        'uses' => 'clientePaso_4Controller@reUpload'
    ]);
    /**
     * [Borrar Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    Route::get('cliente/{id}/delete',[
        'as' => 'clienteDelete',
        'uses' => 'clientePaso_4Controller@delete'
    ]);
    /**
     * [Mostrar Imagenes]
     * @return [type] [JSON]
     */
    Route::get('cliente/{id}/imagenes',[
        'as' => 'clienteImagenes',
        'uses' => 'clientePaso_4Controller@showImg'
    ]);





    //Nuevas rutas para el paso 4

    Route::get('cliente/{id}/informacion',      ['as' => 'clienteInformacion', 'uses' => 'clientePaso_4Controller@verDocumentos']);
    Route::post('cliente/{id}/informacion',     ['as' => 'guardarDocumento', 'uses' => 'clientePaso_4Controller@saveDocumento']);
    Route::get('cliente/{id}/editar',           ['as' => 'editarDocumento', 'uses' => 'clientePaso_4Controller@editDocumento']);
    Route::patch('cliente/{id}/informacion',    ['as' => 'guardarDocumento', 'uses' => 'clientePaso_4Controller@updateDocumento']);
    
    Route::get('cliente/{id}/show/',            ['as' => 'clienteShow',  'uses' => 'clientePaso_1Controller@show'  ]);
























