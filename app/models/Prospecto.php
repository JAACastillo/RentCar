<?php
class Prospecto extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'prospectos';
    protected $dates = ['deleted_at'];
    public $errors;
    protected $perPage = 5;

    protected $fillable = [
        'nombre',
        'direccion',
        'doc_unico',
        'sexo',
        'email',
        'fecha_nac',
        'telefono',
        'celular'
    ];

    public function isValid($data)
    {
        $rules = [
            'nombre' => 'required',
            'direccion' => 'required',
            'doc_unico' => 'required|unique:prospectos',
            'sexo' => 'required',
            'email' => 'email|required|unique:prospectos',
            'telefono' => 'required'
        ];

        if ($this->exists)
            $rules['doc_unico'] .= ',doc_unico,' . $this->id;

        if ($this->exists)
            $rules['email'] .= ',email,' . $this->id;

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
        } else
            return false;
    }
}