<?php

	require __DIR__.'/../../controllers/modelo/modeloPaso_1Controller.php';

    /**

     * [Tabla de Modelos]

     * @return [vista] [auto/modelo/list]

     */

    Route::get('modelo',[

        'as' => 'modeloLista',

        'uses' => 'modeloPaso_1Controller@lista'

    ]);

    /**

     * [Crear Modelo] [Formulario] [Paso 1]

     * @return [vista] [auto/modelo/form]

     */

    Route::get('modelo/create',[

        'as' => 'modeloNuevo',

        'uses' => 'modeloPaso_1Controller@create'

    ]);

    /**

     * [Guardar Datos Del Modelo]

     * @return [Controller] [function] [subirFoto]

     */

    Route::post('modelo/store',[

        'as' => 'modeloStore',

        'uses' => 'modeloPaso_1Controller@store'

    ]);

    /**

     * [Editar Modelo] [Formulario] [Paso 1]

     * @return [vista] [auto/modelo/form]

     */

    Route::get('modelo/{id}/edit',[

        'as' => 'modeloEditar',

        'uses' => 'modeloPaso_1Controller@edit'

    ]);

    /**

     * [Actualizar Datos]

     * @return [Controller] [function] [subirFoto]

     */

    Route::patch('modelo/{id}/update',[

        'as' => 'modeloUpdate',

        'uses' => 'modeloPaso_1Controller@update'

    ]);

    /**

     * [Mostrar Detalles del Modelo]

     * @return [vista] [cliente/show]

     */

    Route::get('modelo/{id}/show',[

        'as' => 'modeloShow',

        'uses' => 'modeloPaso_1Controller@show'

    ]);