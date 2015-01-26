<?php
class Bitacora extends Eloquent
{
    protected $fillable = array('usuario_id','tabla','tabla_id','accion');

    public function Guardar($tabla,$tablaId,$accion)
    {
        $data = [
            'usuario_id' => Auth::user()->id,
            'tabla' => $tabla,
            'tabla_id' => $tablaId,
            'accion' => $accion
        ];

        $this->fill($data);
        $this->save();
    }
    /**
     * [Relación]
     * @return [Relación] [Bitacoras pertenece a usuario]
     */
    public function user()
    {
        return $this->belongsTo('User','usuario_id');
    }
}