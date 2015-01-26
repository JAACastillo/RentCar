<?php
class Precio extends Eloquent
{
    // use SoftDeletingTrait;
    public $errors;
    // protected $perPage = 5;lic 
    public $timestamps = false;
    protected $table = 'precios';
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'cantidad',
        'fechaInicio',
        'fechaFin',
        'carro_id'
    ];

    public function isValid($data)
    {
        $rules = [
            'cantidad'        => 'required',
            'fechaInicio'   => 'required',
            'fechaFin'      => 'required',
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
   
   //relaciones

    public function carro(){
        return $this->belongsTo('carro');
    }
}