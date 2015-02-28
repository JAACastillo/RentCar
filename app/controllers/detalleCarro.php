<?php

class detalleCarro extends Eloquent {
	protected $table = "detalleCarros";

	public function getImagenAttribute(){
		// return $this->attributes['imagen'];
		return ('https://s3.amazonaws.com/carros/carros/' . $this->attributes['imagen']);
	}
}