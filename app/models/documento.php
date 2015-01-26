<?php

class documento extends Eloquent {
	
	public $errors;
	public $timestamps = false;

	protected $fillable = ['numero', 'emision', 'vencimiento', 'tipoDocumento_id', 'Cliente_id', 'imagen'];



	public function isValid($data)
	{
		$rules = [
			'numero' 			=> 'required',
			// 'emision' 			=> 'required',
			'vencimiento' 		=> 'required',
			'tipoDocumento_id' 	=> 'required'
		];
	    $validator = Validator::make($data, $rules);
	    if($validator->passes())
	        return true;
	    $this->errors = $validator->errors();
	    return false;
	}

	public function validAndSave($data)
	{
	    if($this->isValid($data)) {
	        $this->fill($data);
	        $this->save();
	        return true;
	    } 
	    // else
	    return false;
	}


	public function getImagen(){
		return url('imagen') . $this->attributes['imagen'];
	}

	public function tipo(){
		return $this->belongsTo('tipoDocumento', 'tipoDocumento_id');
	}
	public function cliente(){
		return $this->belongsTo('cliente', 'Cliente_id');
	}
}