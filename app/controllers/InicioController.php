<?php
use Carbon\Carbon;


class InicioController extends BaseController {
	public function index(){

		$mes =  Carbon::now('America/El_Salvador')->month;//->addDays(7);
		// return $mes;
		$birthdays = Cliente::whereRaw(' MONTH(fechaNacimiento) = ?', [$mes])
							->orderBy('fechaNacimiento', 'ASC')
							->get();
		// return $birthdays;

		return View::make('inicio.index', compact('birthdays'));
	}

	public function calendario(){
		return Response::json(array('h' => 'hola'), 200);
	}
}