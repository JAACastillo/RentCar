<?php

class Color extends Eloquent{
	protected $table = "colores";
	public $timestamps = false;
	protected $fillable = ['color'];


   public function isValid($data)
    {
        $rules = [
            'color'=>'required|max:100'
        ];

        $validator = Validator::make($data,$rules);

        if($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data)
    {
        if($this->isValid($data))
        {
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }
}