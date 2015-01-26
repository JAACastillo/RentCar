<?php
use Carbon\Carbon;

class Prestamo extends Eloquent
{
    // use SoftDeletingTrait;
    public $errors;
    protected $table = 'prestamos';
    // protected $dates = ['deleted_at'];
    // protected $perPage = 5;

    protected $fillable = [
        'lugarEntrega_id',
        'lugarDevolucion_id',
        'fechaReserva',
        'fechaDevolucion',
        'tipoPago',
        'descuento',
        'cliente_id',
        'carro_id',
        'precio',
        'extra_id',
        'estado_id',
        'empresa_id',
        'placa_id',
        'conductor_id',
        'valorReposicion',
        'cobroPorHora'
    ];

    public function validarPrestamo($data){
        $rules = [
                'cliente_id'        => 'required',
                'fechaReserva'      => 'required',
                'fechaDevolucion'   => 'required',
                'lugarEntrega_id'   => 'required',
                'cobroPorHora'      => 'required',
                'estado_id'         => 'required'
            ];
        return $this->validAndSave($data, $rules);
    }
    public function validarContrato($data){
        $rules = [
                'placa_id'          => 'required',
                'conductor_id'   => 'required|integer',
                'valorReposicion'   => 'required|integer'
            ];
        return $this->validAndSave($data, $rules);
    }

    public function validarPago($data){
        $rules = [
            'tipoPago'  => 'required',
            'descuento' => 'integer'
        ];
        return $this->validAndSave($data, $rules);
    }

    public function isValid($data,$rules)
    {
        $validator = Validator::make($data,$rules);

        if($validator->passes())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    public function validAndSave($data,$accion)
    {
        if($this->isValid($data,$accion)) {
            $this->fill($data);
            $this->save();
            return true;
        }
        return false;
    }
    /**
     * [guardar Datos] [formulario] [pagina inicio] [multiautos]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function guardar($data)
    {
        $this->fill($data);
        $this->save();
        return true;
    }

    //Custom Attributes

    public function getDiasAttribute(){
        $inicio = Carbon::createFromTimestamp(strtotime($this->attributes['fechaReserva']));
        $fin = Carbon::createFromTimestamp(strtotime($this->attributes['fechaDevolucion']));
        return $inicio->diffInDays($fin);
    }
    public function getHorasAttribute(){
        $inicio = Carbon::createFromTimestamp(strtotime($this->attributes['fechaReserva']));
        $fin = Carbon::createFromTimestamp(strtotime($this->attributes['fechaDevolucion']));
        return ($inicio->diffInHours($fin) % 24);
    }

    public function getPrecioDiasAttribute(){
        return round($this->getDiasAttribute() * $this->attributes['precio'],2);
    }
    public function getPrecioHorasAttribute(){
        if($this->attributes['cobroPorHora'] )
            return round($this->getHorasAttribute() * ($this->attributes['precio'] / 24),2);
        return  ($this->getHorasAttribute() > 0 ? $this->attributes['precio'] : 0);
    }

    public function getTotalCarroAttribute(){
        return round($this->getPrecioDiasAttribute() + $this->getPrecioHorasAttribute(),2);
    }

    public function total($precioExtras){
        $precio = $this->getTotalCarroAttribute() + $precioExtras;
        return $precio;
        return round($precio - ($precio * ($this->attributes['descuento'] / 100)),2);
    }

    public function setFechaReservaAttribute($date){
        $this->attributes['fechaReserva'] = date('Y-m-d H:i:s ', strtotime($date));
    }
    public function setFechaDevolucionAttribute($date){
       $this->attributes['fechaDevolucion'] = date('Y-m-d H:i:s', strtotime($date));
    }

    public function getFechaReservaAttribute(){
        return  date('d-m-Y h:i A', strtotime($this->attributes['fechaReserva']));
    }
    public function getFechaDevolucionAttribute(){
       return date('d-m-Y h:i A', strtotime($this->attributes['fechaDevolucion']));
    }
    public function getFechaInicioAttribute(){
         return date('Y-m-d', strtotime($this->attributes['fechaReserva']));
    }
    public function getFechaFinAttribute(){
       return date('Y-m-d', strtotime($this->attributes['fechaDevolucion']));
    }


    //End custom attributes


//custom relationship

    public function placa()             { return $this->belongsTo('Placa');}
    public function lugarEntrega(){     return $this->belongsTo('Lugares','lugarEntrega_id');   }

    public function lugarDevolucion(){  return $this->belongsTo('Lugares','lugarDevolucion_id');}

    public function carro(){           return $this->belongsTo('carro');   }

    public function estado()    {      return $this->belongsTo('estado');    }

    public function cliente()   {      return $this->belongsTo('Cliente','cliente_id');   }
    public function conductor()   {      return $this->belongsTo('Cliente','conductor_id');   }
   
    public function modelo()    {       return $this->belongsTo('Modelo','modelo_id');    }
    
    public function precio()    {       return $this->belongsTo('Precio','precio_id');    }
   
    public function extras()    {       return $this->hasMany  ('prestamoExtra');    }
}
