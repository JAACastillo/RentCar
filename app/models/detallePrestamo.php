<?php
use Carbon\Carbon;


class detallePrestamo extends Eloquent{

protected $table = "detallePrestamos";



 //Custom Attributes

    public function getDiasAttribute(){
        $inicio = Carbon::createFromTimestamp(strtotime($this->attributes['del']));
        $fin = Carbon::createFromTimestamp(strtotime($this->attributes['al']));
        return $inicio->diffInDays($fin);
    }
    public function getHorasAttribute(){
        $inicio = Carbon::createFromTimestamp(strtotime($this->attributes['del']));
        $fin = Carbon::createFromTimestamp(strtotime($this->attributes['al']));
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
        // return $precio;
        return round($precio - ($precio * ($this->attributes['descuento'] / 100)),2);
    }


    public function getDelAttribute(){
        return  date('d-m-Y', strtotime($this->attributes['del']));
    }
    public function getAlAttribute(){
       return date('d-m-Y', strtotime($this->attributes['al']));
    }



 public function extras()    {   return $this->hasMany  ('prestamoExtra', 'prestamo_id');    }	
}