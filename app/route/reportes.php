<?php



Route::get('reportes',	['as' => 'reportes', 'uses' => 'reporteController@index']);



//Para devolver el jSON para Angular JS
Route::post('reportes/reservas', ['as' => 'reporteReserva', 'uses' => 'reporteController@reserva']);