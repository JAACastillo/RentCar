<?php

class carro extends Eloquent {
	public $errors;
	// protected $table = 'modelos';
	// protected $dates = ['deleted_at'];
	// protected $perPage = 5;

	protected $fillable = [
	    'modelo_id',
	    'ano',
	    'motor',
	    'transmision',
	    'puertas',
	    'color_id',
	    'capacidad',
	    'kmGalon',
	    'combustible_id',
	    'equipamiento',
	    // 'existencias',
	    'imagen',
	    'empresa_id',
	    'estado',
	    'tipoCarro_id',
	    'proveedor'
	];


	public function isValid($data)
	{
	    $rules = [
	        'tipoCarro_id' 		=> 'required',
	        'modelo_id'			=> 'required|exists:modelos,id',
	        'ano' 				=> 'required|integer',
	        'motor' 			=> 'required|max:20',
	        'transmision' 		=> 'required|max:50',
	        'puertas' 			=> 'required|integer',
	        'color_id' 			=> 'required',
	        'capacidad' 		=> 'required|max:20',
	        'kmGalon' 			=> 'required|max:30',
	        'combustible_id' 	=> 'required|max:30',
	        'equipamiento' 		=> 'max:20',
	        'proveedor' 		=> 'max:50',

	        // 'imagen'			=> 'required|max:10000|mimes:png,jpg,jpeg'
	        // 'existencias' 		=> 'integer|required'
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


	public function color(){
		return $this->belongsTo('Color');
	}
	public function combustible(){
		return $this->belongsTo('Combustible');
	}

	public function precios(){
		return $this->hasMany('Precio');
	}

	public function placas(){
		return $this->hasMany('Placa');
	}

	public function modelo(){
		return $this->belongsTo('Modelo');
	}

	public function tipo(){
		return $this->belongsTo('TipoCarro', 'tipoCarro_id');
	}

}