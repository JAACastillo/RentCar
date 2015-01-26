<?php
    /**
     * [Formulario Cliente]
     * @return [vista] [buscar/cliente]
     */
    Route::get('buscar-cliente',[
        'as' => 'buscarCliente',
        'uses' => 'BuscarController@formCliente'
    ]);
    /**
     * [Formulario Prospecto]
     * @return [vista] [buscar/prospecto]
     */
    Route::get('buscar-prospecto',[
        'as' => 'buscarProspecto',
        'uses' => 'BuscarController@formProspecto'
    ]);
    /**
     * [Formulario Prestamo]
     * @return [vista] [buscar/prestamo]
     */
    Route::get('buscar-prestamo',[
        'as' => 'buscarPrestamo',
        'uses' => 'BuscarController@formPrestamo'
    ]);
    /**
     * [Buscar Datos]
     * @return [route] [Buscar Datos Según La Tabla]
     */
	Route::post('busqueda',[
		'as' => 'busqueda',
		'uses' => 'BuscarController@busqueda'
	]);

    /**
     * [Buscar datos]
     * @param  [type] $dato [description]
     * @return [vista] [user/list] [marca/list] [tipo/list]
     */
	Route::get('{tabla}/{campo}/{texto_1}/{texto_2?}',[
		'as' => 'buscar',
		'uses' => 'BuscarController@buscar'
	]);