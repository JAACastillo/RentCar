<?php

class LoginController extends BaseController

{

    /**
     * [Muestra Formulario de Logueo]
     * @return [vista] [Login]
     */

    public function showLogin()

    {

        if(Auth::check())

            return Redirect::to('/');

        else

            return View::make('login');

    }

    /**
     * [Valida los Datos Para Iniciar Sesión]
     * @return [Vista] [Página Actual]
     */

    public function postLogin()

    {

        $userdata = [

            'email' => Input::get('email'),

    	    'password' => Input::get('password')

        ];



    	if(Auth::attempt($userdata, Input::get('remember-me', false)))

            return Redirect::to('/');

        else

            return Redirect::back()

                ->with('mensaje_info','El correo o contraseña son incorrectos, vuelve a intentarlo')

                ->with('clase','alert-danger');

    }

    /**
     * [Cerrar Sesión]
     * @return [url] [/login]
     */

    public function logOut()

    {

        Auth::logout();



        return Redirect::route('home')

            ->with('mensaje_info','Tu sesión ha sido cerrada.')

            ->with('clase','alert-info');

    }

}