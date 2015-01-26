<?php
    /**
     * [Tabla de Tipos]
     * @return [vista] [auto/tipo/list]
     */
	Route::get('tipo/',[
		'uses' => 'TipoController@lista'
	]);
    /**
     * [Guardar Datos De la Marca]
     * @return [vista] [auto/tipo/list]
     */
	Route::post('tipo/store/',[
		'uses' => 'TipoController@store'
	]);
	/**
     * [Editar Tipo] [Formulario]
     * @return [type]     [JSON]
     */
	Route::get('tipo/{id}/edit/',[
		'as' => 'tipoEditar',
		'uses' => 'TipoController@edit'
	]);
    /**
     * [Actualizar Datos]
     * @return [vista] [auto/tipo/list]
     */
	Route::get('tipo/update/{id}',[
		'uses' => 'TipoController@update'
	]);