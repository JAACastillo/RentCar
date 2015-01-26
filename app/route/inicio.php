<?php


Route::get('/', ['as' => 'admin', 'uses' => 'InicioController@index']);
Route::get('calendario', 'InicioController@calendario');