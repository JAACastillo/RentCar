<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function(){
    return View::make('home.index');
});

Route::group(array('prefix' => '/renta'), function(){
    require __DIR__ . '/route/renta.php';
});



Route::get('pdf1', function(){
    return View::make('pdfs.contrato');
});

Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@postLogin');


// Route::get('email/confirmacion', ['as' => 'emailConfirmacion', 'uses' => function(){
//     $prestamo = Prestamo::find(97);

//     Mail::send('emails.reservado', array('prestamo' => $prestamo), function($message)
//     {
//         $message->to('rsanabria@hotmail.es', 'Rene Sanrbai')->subject('Reserva aprobada');
//     });

//     return View::make('emails.reservado', compact('prestamo'));
// }]);





        require __DIR__ . '/route/api.php';

    Route::get('logout', ['as' => 'logOut', 'uses' => 'LoginController@logOut']);
Route::group(array('before'=>'auth|isAdmin|plan'), function() {
     Route::get('cal', function(){
            return View::make('inicio.calendario');
        });


    Route::group(array('prefix' => 'admin'), function(){


       
        //pjp esto hay que cambiarlo
        Route::get('search/{query}', function($query){
            $clientes = Cliente::where('nombre', 'LIKE', '%'. $query .'%')
                        ->where('tipo', '!=', 'adicional')
                        ->where('tipo', '!=', 'Emergencia')
                        ->where('empresa_id', Auth::user()->empresa->id)
                        ->get();
            // $clientes = Cliente::all();
            $results = [];
            foreach ($clientes as $cliente) {
                $data = array(
                        'name'  => $cliente->nombre . ' - ' . $cliente->como,
                        'id'    => $cliente->id,
                        'ruta'  =>  Route('clienteShow', $cliente->id)
                    );
                $results[] = $data;
            }

            // $placas = Placa::where('numero', 'LIKE', "%" . $query . "%")
            //                 ->where('empresa_id', Auth::user()->empresa->id)
            //                 ->get();

            // foreach ($placas as $placa) {
            //     $data = array(
            //             'name'  => $placa->numero,
            //             'id'    => $placa->carro->id,
            //             'ruta'  =>  Route('carroPlacas', $placa->carro->id)
            //         );
            //     $results[] = $data;
            // }

            // return View::make('index');
            // if()
            return Response::json($results, 200);

        });
    // Route::get('/', function() {
    //     return Redirect::to('prestamo');
    // });

        require __DIR__ . '/route/empresas.php';
        require __DIR__ . '/route/color.php';
        require __DIR__ . '/route/inicio.php';

        require __DIR__ . '/route/usuario.php';

        require __DIR__ . '/route/reportes.php';


        /**
         * [url] [/clientes]
         */
        require __DIR__.'/route/cliente/Paso_1.php';
        require __DIR__.'/route/cliente/Paso_2.php';
        require __DIR__.'/route/cliente/Paso_3.php';
        require __DIR__.'/route/cliente/Paso_4.php';
        require __DIR__.'/route/cliente/Paso_5.php';

        require __DIR__.'/route/Marca.php';
        require __DIR__.'/route/Tipo.php';


        Route::get(     'extra',             ['as' => 'extra',       'uses' => 'ExtraController@index'] );
        Route::get(     'extra/create',      ['as' => 'extraNuevo',  'uses' => 'ExtraController@create']);
        Route::post(    'extra/create',      ['as' => 'extraSave',   'uses' => 'ExtraController@store']);
        Route::get(     'extra/{id}/edit',   ['as' => 'extraEdit',   'uses' => 'ExtraController@edit']);
        Route::patch(   'extra/{id}/update', ['as' => 'extraUpdate', 'uses' => 'ExtraController@update']);
        Route::delete(  'extra/{id}/destroy',['as' => 'extraDestroy','uses' => 'ExtraController@destroy']);
        

        // Route::resource('extra','ExtraController');


        require __DIR__.'/route/carros.php';
        require __DIR__.'/route/prestamo/Paso_1.php';
        require __DIR__.'/route/prestamo/Paso_2.php';
        require __DIR__.'/route/prestamo/Paso_3.php';
        require __DIR__.'/route/prestamo/Paso_4.php';
        /**
         * [url] [/contratos]
         */
        require __DIR__.'/route/Pdf.php';
        /**
         * [url] [/prospectos]
         */
        require __DIR__.'/route/Prospecto.php';
        /**
         * [url] [/boletin]
         * [Tabla de Boletines]
         * @return [vista] [boletin/list]
         */
        Route::get('boletin',[
            'as' => 'boletinLista',
            'uses' => 'BoletinController@lista'
        ]);
        /**
        ** URL / BUSCAR
        **/
        require __DIR__.'/route/Buscar.php';
    });
});