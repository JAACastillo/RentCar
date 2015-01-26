<?php
class Foto extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'fotos';
    protected $dates = ['deleted_at'];
    public $errors;

    protected $fillable = [
        'ruta_imagen',
        'modelo_id'
    ];

    public function isValid($data)
    {

        $rules = [
            'ruta_imagen' => 'required',
            'modelo_id'=>'required'
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
    /**
     * [Relación]
     * @return [Relación] [Fotos pertenece a Modelo]
     */
    public function modelo()
    {
        return $this->belongsTo('Modelo','modelo_id');
    }
}