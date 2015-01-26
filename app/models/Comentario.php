<?php

class Comentario extends Eloquent {

	protected $fillable = ['texto', 'Cliente_id'];
	public $errors;

	public function isValid($data)
	{
		$rules = [
			'texto' 			=> 'required',
			'Cliente_id' 		=> 'required'
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

}