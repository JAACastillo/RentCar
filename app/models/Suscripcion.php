<?php
use Carbon\Carbon as Carbon;
class Suscripcion extends Eloquent{
	protected $table = "suscripcion";
	private $mensajes  = array(
			'Gratis' => array(
					'mensaje' 	=> 'Tu prueba gratis finaliza en <strong>',
					'fecha'		=> 'trialEnd',
					'dias'		=> '15'
				),
			'Pago' => array(
					'mensaje' 	=> 'Tu plan vence en ',
					'fecha'		=> 'fechaVencimiento',
					'dias'		=> '5'
				)
		);

	public function getDates(){
		return array('fechaVencimiento');
	}

	private function dias($fecha){
		$dt = Carbon::now();
		return $dt->diffInDays($fecha);
	}

	public function getMensajeAttribute(){
		$mensaje = $this->mensajes[$this->attributes['tipo']]['mensaje'];
		$diasVence = $this->mensajes[$this->attributes['tipo']]['dias'];

		$dias    = $this->dias($this->date()); 
		if($diasVence > $dias)
			return $mensaje .  $dias . ' días </strong> '; 
		return false;
	}

	private function getMensaje($tipo){
		return $this->mensajes[$tipo];
	}

	public function getDiasAttribute(){		
		return $this->dias($this->date());
	}

	private function campo(){
		$fecha = $this->getMensaje($this->attributes['tipo'])['fecha'];
		return $this->attributes[$fecha];
	}

	private function date(){
		return Carbon::createFromTimestamp(strtotime($this->campo() . "23:59:59"));
	}

	public function getFinalizacionAttribute(){
		return $this->date()->toRfc2822String();
	}

	public function getVigenteAttribute(){		
		return !$this->date()->isPast();// && $fecha->isSameDay(Carbon::now());
	}
}