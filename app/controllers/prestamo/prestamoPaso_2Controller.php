<?php
class prestamoPaso_2Controller extends BaseController
{
    public function select($id)
    {
        $prestamo = Prestamo::with('lugarEntrega', 'lugarDevolucion')->find($id);

        if(is_null($prestamo))
            App::abort(404);

        $carros = $this->jsonCarros($prestamo->fechaInicio, $prestamo->fechaFin, Auth::user()->empresa->id);
        $paso = 2;
        return View::make('prestamo/select',compact('prestamo','carros','paso'));
    }

    public function jsonCarros($fechaInicio, $fechaFin, $empresaID){
        $carros = carro::orderBy('created_at','dsc')
                        ->with('color', 'combustible', 'modelo','modelo.marca', 'tipo')
                        ->where('empresa_id', $empresaID)
                        ->paginate(5);
        foreach ($carros as $carro) {
            $precios = $carro->precios()
                            ->where('fechaInicio', '<=', $fechaInicio)
                            ->where('fechaFin', '>=', $fechaFin)
                            ->orderBy('cantidad', 'DESC')
                            ->get();
            if(count($precios) > 0)
                $carro->precio = $precios[0]->cantidad;
            else
                $carro->precio = "NTN";
        }
        return $carros;
    }

    public function addCarro($id, $idCarro, $precio){
        $prestamo           = Prestamo::find($id);
        $prestamo->carro_id = $idCarro;
        $prestamo->precio   = $precio;
        if($prestamo->estado_id == 1)
            $prestamo->estado_id = 2;
        $prestamo->save();

        return Redirect::back();

    }












// revisar mas adelante las finciones de aqi hacia abajo
    /**
     * [Guardar Datos Del Prestamo] [Modelo] [Precio]
     * @return [route] [selectExtra]
     */
    public function store($prestamo_id,$modelo_id,$precio_id)
    {
        $prestamo = Prestamo::find($prestamo_id);

        if(is_null($prestamo))
            App::abort(404);

        $data['modelo_id'] = $modelo_id;
        $data['precio_id'] = $precio_id;
        $prestamo->fill($data);
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('selectExtras',$prestamo_id);
    }
    /**
     * [Quitar Modelo del Auto]
     * @param  [type] $id [ID del Prestamo]
     * @return [route] [selectModelo]
     */
    public function quitar($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $prestamo->modelo_id = 0;
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('selectModelo',$prestamo->id);
    }
}