<?php

class Empresa extends Eloquent {
	
 protected $fillable = [
        'nombre',
        'direccion',
        'logo',
        'telefono',
        'email'
    ];

    public function isValid($data)
    {
        $rules = [
            'nombre'        => 'required|max:100',
            'direccion'   => 'required|max:250',
            'logo'        	=> 'required',
            'telefono'		=> 'required',
            'email'			=> 'required|email'
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

    public function getImagenAttribute(){
        return ('https://s3.amazonaws.com/carros/logos/' . $this->attributes['logo']);
    }

    public function suscripcion(){
        return $this->hasOne('Suscripcion');
    }

}