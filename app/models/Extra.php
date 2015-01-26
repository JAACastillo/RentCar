<?php
class Extra extends Eloquent
{
    // use SoftDeletingTrait;
    public $errors;
    protected $table = 'extras';
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'obligatorio',
        'cobro',
        'empresa_id'
    ];

    public function isValid($data)
    {
        $rules = [
            'nombre'        => 'required|max:100',
            'descripcion'   =>'required|max:250',
            'precio'        =>'required'
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


    
}