<?php
/**
 * [Tabla de Prospectos]
 * @return [vista] [prospecto/list]
 */
	Route::get('prospecto',[
		'as' => 'prospectoList',
		'uses' => 'ProspectoController@lista'
	]);
    /**
     * [Crear Prospectos - Formulario]
     * @return [vista] [prospecto/form]
     */
	Route::get('prospecto/create',[
		'as' => 'prospectoNuevo',
		'uses' => 'ProspectoController@create'
	]);
    /**
     * [Guardar Datos Del Prospecto]
     * @return [type] [description]
     */
	Route::post('prospecto/store',[
		'as' => 'prospectoStore',
		'uses' => 'ProspectoController@store'
	]);
    /**
     * [Editar Prospectos] [Formulario]
     * @return [vista] [prospecto/form]
     */
	Route::get('prospecto/{id}/edit',[
		'as' => 'prospectoEditar',
		'uses' => 'ProspectoController@edit'
	]);
    /**
     * [Actualizar Datos]
     * @return [vista] [prospecto/formularios/contacto]
     */
	Route::patch('prospecto/{id}/update',[
		'as' => 'prospectoUpdate',
		'uses' => 'ProspectoController@update'
	]);
    /**
     * [Mostrar Detalles del Prospecto]
     * @return [vista] [prospecto/show]
     */
    Route::get('prospecto/{id}/show/',[
        'as' => 'prospectoShow',
        'uses' => 'ProspectoController@show'
    ]);
	/**
     * [Borrar Prospecto]
     * @param  [type] $id [ID del Prospecto]
     * @return [vista] [prospecto/list]
     */
    Route::delete('prospecto/destroy/{id}',[
    	'as' => 'prospectoDestroy',
		'uses' => 'ProspectoController@destroy'
	]);
    /**
     * [Convertir Prospecto a Cliente]
     * @param  [type] $id [ID del Prospecto]
     * @return [vista] [prospecto/list]
     */
    Route::get('prospecto/convertir/{id}',[
        'as' => 'prospectoConvertir',
        'uses' => 'ProspectoController@convertir'
    ]);