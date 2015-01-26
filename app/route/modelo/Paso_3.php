<?php
	require __DIR__.'/../../controllers/modelo/modeloPaso_3Controller.php';
    /**
     * [Nuevo Precio] [Formulario] [Paso 3]
     * @return [vista] [auto/modelos/precios/form]
     */
    Route::get('modelo/{id}/precio',[
        'as' => 'modeloPrecio',
        'uses' => 'modeloPaso_3Controller@precio'
    ]);
    /**
     * [Guardar Datos Del Precio]
     * @return [vista] [cliente/formularios/contacto]
     */
    Route::patch('modelo/{id}/guardar',[
        'as' => 'precioGuardar',
        'uses' => 'modeloPaso_3Controller@guardar'
    ]);
    /**
     * [Editar Precio] [Formulario] [Paso 3]
     * @return [vista] [auto/modelo/precios/form]
     */
    Route::get('modelo/{id}/editar',[
        'as' => 'precioEditar',
        'uses' => 'modeloPaso_3Controller@editar'
    ]);
    /**
     * [Actualizar Datos]
     * @return [vista] [auto/modelo/precios/form]
     */
    Route::patch('modelo/{id}/actualizar',[
        'as' => 'precioActualizar',
        'uses' => 'modeloPaso_3Controller@actualizar'
    ]);
    /**
     * [Borrar Precio]
     * @return [vista] [auto/modelo/precios/form]
     */
    Route::delete('modelo/borrar/{id}',[
        'as' => 'precioBorrar',
        'uses' => 'modeloPaso_3Controller@destroy'
    ]);