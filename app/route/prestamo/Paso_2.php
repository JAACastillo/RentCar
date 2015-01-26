<?php
    Route::get('prestamo/{id}/select',['as' => 'selectModelo', 'uses' => 'prestamoPaso_2Controller@select']);
    

    Route::get('prestamo/{id}/{carro}/{precio}/select', ['as' => 'prestamoCarro', 'uses' => 'prestamoPaso_2Controller@addCarro' ]);







//de aqui hacia abajo posiblemente halla que eliminar las rutas que esta dando anibal
    /**
     * [Guardar Datos Del Prestamo] [Modelo] [Precio]
     * @return [route] [selectExtra]
     */
    Route::get('prestamo/{prestamo_id}/storePaso2/{modelo_id}/{precio_id}',[
        'as' => 'selectAuto',
        'uses' => 'prestamoPaso_2Controller@store'
    ]);
    /**
     * [Quitar Modelo del Auto]
     * @return [route] [selectModelo]
     */
    Route::get('prestamo/{id}/cambiarAuto',[
        'as' => 'quitarModelo',
        'uses' => 'prestamoPaso_2Controller@quitar'
    ]);