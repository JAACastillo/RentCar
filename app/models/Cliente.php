<?php
class Cliente extends Eloquent
{
    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
    public $errors;

    protected $fillable = [
        'tipo',
        'nombre',
        'direccion',
        'fechaNacimiento',
        'sexo',
        'email',
        'empresa_id',
        'telefono',
        'celular',
        'telefonoExtranjero',
        'como'
    ];



    public function validarClienteRenta($data){
        $rules = [
            'tipo'      => 'required',
            'nombre'    => 'required',
            'email'     => 'required'
        ];
        return $this->validAndSave($data,$rules);
    }

    public function validarCliente($data){
        $rules = [
            'tipo'              => 'required',
            'nombre'            => 'required',
            'direccion'         => 'required',
            // 'fechaNacimiento'   => 'required',
            'sexo'              => 'required',
            // 'empresa_id'        => 'required',
            // 'email'             => 'required',
            'telefono'          => 'required'
        ];
        return $this->validAndSave($data,$rules);
    }

    public function validarEmergencia($data){
        $rules = [
            'tipo'              => 'required',
            'nombre'            => 'required',
            'direccion'         => 'required',
            'telefono'          => 'required'
        ];
        return $this->validAndSave($data,$rules);
    }

    public function validarConductor($data){
        $rules = [
            'tipo'              => 'required',
            'nombre'            => 'required',
            'telefono'          => 'required',
            'licencia'          => 'required',
            'fechaLicencia'     => 'required',
            'fechaVencimiento'  => 'required'
        ];
        return $this->validAndSave($data,$rules);
    }
    public function isValid($data, $rules)
    {
        $validator = Validator::make($data,$rules);
        if($validator->passes())
            return true;
        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data, $rules)
    {
        if($this->isValid($data,$rules)) {
            $this->fill($data);
            $this->save();
            return true;
        } else
            return false;
    }
    /**
     * [Formato de fecha] [Y-m-d a d-m-Y]
     * @param  [type] $data [Modelo]
     * @return [type]       [Datos con Nuevo Formato]
     */
    public function fechaDmy($cliente)
    {
        $cliente->fecha_nac = ($cliente->fecha_nac == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_nac));
        $cliente->fecha_emi_lic = ($cliente->fecha_emi_lic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_emi_lic));
        $cliente->fecha_ven_lic = ($cliente->fecha_ven_lic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_ven_lic));
        $cliente->fecha_ven_cre = ($cliente->fecha_ven_cre == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->fecha_ven_cre));
        $cliente->adicional_femilic = ($cliente->adicional_femilic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->adicional_femilic));
        $cliente->adicional_fevenlic = ($cliente->adicional_fevenlic == '0000-00-00') ? '' : date('d-m-Y', strtotime($cliente->adicional_fevenlic));
        return $cliente;
    }


    public function getNacimientoAttribute(){
        return date('d-m-Y', strtotime($this->attributes['fechaNacimiento']));
    }

    public function datosDocumento($documento){
        return $this->documentos()
                        ->whereHas('tipo', function($q) use ($documento){
                            return $q->where('tipo', $documento);
                        })
                        ->first();
    }

    public function prestamos() {
        return $this->hasmany('Prestamo','cliente_id');
    }


    public function phone($tipo){
        return $this->hasMany('telefono')->where('tipo', $tipo)->first();
    }
    /**
     * [Relación]
     * @return [Relación] [Cliente tiene muchas imagenes]
     */
    public function imagenes() {
        return $this->hasmany('Imagen','cliente_id');
    }

    public function emergencia(){
        return $this->hasOne('cliente', 'id','emergencia_id');
    }
    public function conductor(){
        return $this->hasOne('cliente', 'id', 'adicional_id');
    }
    public function documentos(){
        return $this->hasMany('documento');
    }
    public function comentarios(){
        return $this->hasMany('Comentario');
    }

}










