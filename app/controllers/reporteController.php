<?php

class reporteController extends BaseController{
	public function index(){
		return View::make('reportes.reservas');
	}




	public function reserva(){

		$del = Input::get('del');
		$al = Input::get('al');


		$reservas = detallePrestamo::where('empresa_id', Auth::user()->empresa->id)
									->whereBetween('del', array($del, $al))
									// ->where('del', ">=", $del)
									// ->where('del', "<=", $al)
									->where('cancelado',0)
									->where('estado_id', '>', 4)
									->orderBy('del', 'asc')
									->get();

							//all();


		foreach ($reservas as $reserva) {
			$precio = 0;
			$reserva->duracion = $reserva->dias . ' días (' . $reserva->horas . ' horas)';
			foreach ($reserva->extras as $extra) {
				$precio += round($extra->cantidad($reserva->dias,$reserva->horas),2);
			}
			$reserva->cantidad = $reserva->total($precio);
		}


		return Response::json($reservas, 200);
	}


}