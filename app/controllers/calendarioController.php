<?php

class calendarioController extends BaseController{

	public function eventos(){

		$start = Input::get('from') / 1000;
	    $end   = Input::get('to') / 1000;
	    $start = date("Y-m-d", $start);
	    $end = date("Y-m-d", $end);




	    //Consultas a la base de datos
	//hay que agregar que muestre los que están listos para ser entregados
    $entregas  = Prestamo::whereBetween('fechaReserva', array($start, $end))
    						->where('estado_id', 5) //mostrar solo los prestamos que estén pagados
                ->where('cancelado', 0)
                ->where('empresa_id', Auth::user()->empresa->id)
    						->get();

    // Salida::whereBetween('fecha_inicio', array($start, $end))
    //                         ->get();

    $eventos  = [];

    $addTime = 21600000; //6 horas

      foreach ($entregas as $entrega) {
        // $combinada = ($at->contrato->fecha_final . ' ' . '10:00:00');
        $eventos[] = array(
                             "id"       => $entrega->id,
                              "title"   => $entrega->cliente->nombre . ' (' . $entrega->fechaReserva . ')',// . "/" . $at->fecha, //. ((strtotime($combinada) * 1000) + $addTime),
                              "url"     =>  route('prestamoContrato',$entrega->id) ,
                              "class"   =>"event-success",
                              "start"   => (strtotime($entrega->fechaReserva) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($entrega->fechaReserva) * 1000 )  + $addTime //  + 86400000// Milliseconds
                          );
      }


     $devoluciones = Prestamo::whereBetween('fechaDevolucion', array($start, $end))
                ->where('estado_id', 6) //mostrar solo los prestamos que estén pagados
                ->where('empresa_id', Auth::user()->empresa->id)
                ->get();
    foreach ($devoluciones as $entrega) {
        // $combinada = ($at->contrato->fecha_final . ' ' . '10:00:00');
        $eventos[] = array(
                             "id"       => $entrega->id,
                              "title"   => $entrega->cliente->nombre . ' (' . $entrega->fechaDevolucion . ')',
                              "url"     =>  route('prestamoRecibir',$entrega->id) ,
                              "class"   =>"event-warning",
                              "start"   => (strtotime($entrega->fechaDevolucion) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($entrega->fechaDevolucion) * 1000 )  + $addTime //  + 86400000// Milliseconds
                          );
      }

     $preReservas = Prestamo::whereBetween('fechaReserva', array($start, $end))
                ->where('estado_id', 3) //mostrar solo los prestamos que estén pagados
                ->where('cancelado', 0)
                ->where('empresa_id', Auth::user()->empresa->id)
                ->get();
    foreach ($preReservas as $entrega) {
        // $combinada = ($at->contrato->fecha_final . ' ' . '10:00:00');
        $eventos[] = array(
                             "id"       => $entrega->id,
                              "title"   => $entrega->cliente->nombre . ' (' . $entrega->fechaReserva . ')',
                              "url"     =>  route('prestamoRecibir',$entrega->id) ,
                              "class"   =>"event-info",
                              "start"   => (strtotime($entrega->fechaReserva) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($entrega->fechaReserva) * 1000 )  + $addTime //  + 86400000// Milliseconds
                          );
      }
    return Response::json(array("success" => 1, "result" => $eventos), 200);
	}
		
}