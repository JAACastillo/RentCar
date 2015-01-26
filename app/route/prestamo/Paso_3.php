<?php
    /**
     * [Seleccionar Accesorios]
     * @return [vista]     [prestamo/select]
     */
    Route::get('prestamo/{id}/extra',[
        'as' => 'selectExtras',
        'uses' => 'prestamoPaso_3Controller@index'
    ]);




    Route::get('prestamo/{id}/{extra}/extra',  ['as' => 'prestamoExtra',   'uses' => 'prestamoPaso_3Controller@add']);
    Route::get('prestamo/{id}/delete-extra',            ['as' => 'extraDelete',     'uses' => 'prestamoPaso_3Controller@delete']);
//Revisar de aqui para abajo


    /**
     * [Guardar Datos Del Prestamo] [Extra]
     * @return [route] [formaPago]
     */
    Route::patch('prestamo/{id}/storeExtra',[
        'as' => 'extraStore',
        'uses' => 'prestamoPaso_3Controller@store'
    ]);
    /**
     * [Quitar Accesorio]
     * @return [route] [selectExtra]
     */
    Route::get('prestamo/{prestamo_id}/quitarExtra/{extra_id}',[
        'as' => 'quitarExtra',
        'uses' => 'prestamoPaso_3Controller@quitar'
    ]);