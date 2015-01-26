<?php

	require __DIR__.'/../../controllers/cliente/clientePaso_1Controller.php';

    /**

     * [Tabla de Clientes]

     * @return [vista] [cliente/list]

     */

	Route::get('cliente',[

		'as' => 'clienteLista',

		'uses' => 'clientePaso_1Controller@lista'

	]);

    /**

     * [Crear Clientes - Formulario]

     * @return [vista] [cliente/form]

     */

	Route::get('cliente/create',[

		'as' => 'clienteNuevo',

		'uses' => 'clientePaso_1Controller@create'

	]);

    /**

     * [Guardar Datos Del Cliente]

     * @return [type] [description]

     */

	Route::post('cliente/store',[

		'as' => 'clienteStore',

		'uses' => 'clientePaso_1Controller@store'

	]);

    /**

     * [Editar Clientes] [Formulario] [Paso 1]

     * @return [vista] [cliente/formularios/cliente]

     */

	Route::get('cliente/{id}/edit',[

		'as' => 'clienteEditar',

		'uses' => 'clientePaso_1Controller@edit'

	]);

    /**

     * [Actualizar Datos]

     * @return [vista] [cliente/formularios/contacto]

     */

	Route::patch('cliente/{id}/update',[

		'as' => 'clienteUpdate',

		'uses' => 'clientePaso_1Controller@update'

	]);
