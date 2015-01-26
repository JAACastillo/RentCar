<?php

class mantenimiento extends Eloquent{
	public $timestamps = false;
	public $errors;

	protected $fillable = [
		'placa_id',
		'tipoMantenimiento_id',
		'detalles',
		'fecha'
	];


	public function isValid($data)
	{
	    $rules = [
	        'placa_id' 				=> 'required|integer',
			'tipoMantenimiento_id' 	=> 'required|integer',
			'detalles' 				=> 'required',
			'fecha' 				=> 'required|date',
	    ];

	    $validator = Validator::make($data,$rules);

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
	    return false;
	}

	public function tipo(){
		return $this->belongsTo('tipoMantenimiento', 'tipoMantenimiento_id');
	}
}