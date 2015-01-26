<?php

	
    /**
     * [Tabla de Prestamos]
     * @return [vista] [prestamo/list]
     */

Route::get('prestamo',         ['as' => 'prestamoLista','uses' => 'prestamosController@index'  ]);
Route::get('prestamo/create',  ['as' => 'prestamoNuevo','uses' => 'reservacionController@create' ]);
Route::post('prestamo/store',  ['as' => 'prestamoStore','uses' => 'reservacionController@store'  ]);



Route::get('prestamo/{id}/edit',        ['as' => 'prestamoEditar', 'uses' => 'reservacionController@edit' ]);
Route::patch('prestamo/{id}/update',    ['as' => 'prestamoUpdate', 'uses' => 'reservacionController@update']);
Route::get('prestamo/{id}/show',        ['as' => 'prestamoVer',   'uses' => 'reservacionController@show'  ]);



Route::get('prestamo/confirmar/{id}',		['as' => 'prestamoConfirmar',     'uses' => 'reservacionController@confirmar'    ]);
Route::get('prestamo/{id}/requerimiento',   ['as' => 'prestamoRequerimiento', 'uses' => 'reservacionController@requerimiento']);

Route::delete('prestamo/destroy/{id}',['as' => 'prestamoDestroy', 'uses' => 'reservacionController@destroy' ]);