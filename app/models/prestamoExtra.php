<?php

class prestamoExtra extends Eloquent {
	protected $table = 'prestamoExtra';
	public $timestamps = false;

	protected $fillable = ['extra_id', 'prestamo_id', 'precio', 'unaVez'];

	public function definicion(){
		return $this->belongsTo('Extra', 'extra_id');
	}


    public function cantidad($dias,$horas){
        if($this->attributes['unaVez'])
            return $this->attributes['precio'];
        return ($this->attributes['precio'] * $dias + (($this->attributes['precio']/24) * $horas));
    }
}