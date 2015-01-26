<?php
    /**
     * [Tabla de Marcas]
     * @return [vista] [auto/marca/list]
     */
	Route::get('marca',[
		'uses' => 'MarcaController@lista'
	]);
    /**
     * [Guardar Datos De la Marca]
     * @return [vista] [auto/marca/list]
     */
	Route::post('marca/store/',[
		'uses' => 'MarcaController@store'
	]);
    /**
     * [Editar Marca] [Formulario]
     * @return [type]     [JSON]
     */
	Route::get('marca/{id}/edit',[
		'as' => 'marcaEditar',
		'uses' => 'MarcaController@edit'
	]);
    /**
     * [Actualizar Datos]
     * @return [vista] [auto/marca/list]
     */
	Route::get('marca/update/{id}',[
		'uses' => 'MarcaController@update'
	]);
    /**
     * [Mostrar Detalles de la Marca]
     * @return [type]     [description]
     */
	Route::get('marca/show/{id}',[
		'as' => 'marcaShow',
		'uses' => 'MarcaController@show'
	]);