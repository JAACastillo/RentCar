<?php
class SubirArchivo extends Eloquent
{
    /**
     * [Subir Imagenes al Servidor]
     * @return [type] [Nombre de la Imagen]
     */
    public function ImagenFoto($imagen,$modelo)
    {
        $bitacora = new Bitacora;

        if(is_null($modelo))
            App::abort(404);

        $file = Input::file('ruta_imagen');
        $img = '';

        if(Input::hasFile('ruta_imagen')) {
            $img = $file->getClientOriginalName();
            $file->move("assets/img",$img);
        } else
            $img = '';

        $imagen->ruta_imagen = $img;
        $imagen->save();
        $bitacora->Guardar(8,$imagen->id,2);
        return Redirect::route('modeloFoto',$modelo->id);
    }
    /**
     * [Formulario Para Subir Fotos / Imagenes]
     * @param [modelo] $clienteModelo [Modelo] [Cliente]
     * @param [modelo] $imgFt         [Imagen] [Foto]
     * @param [texto] $cltMdl_id     [cliente_id] [modelo_id]
     * @param [entero] $id            [cliente_id] [modelo_id]
     * @param [type] $url           [description]
     * @param [string] $action        [Crear / Eitar]
     * @param [entero] $paso          [description]
     * @return [vista] [cliente/fotos/form] [auto/modelo/fotos/form]
     */
    public function ImagenesFotos($clienteModelo,$imgFt,$cltMdl_id,$id,$url,$action,$paso)
    {
        $form = new Formulario;

        if(is_null($clienteModelo))
            App::abort(404);

        $galeria = $imgFt::where($cltMdl_id,$id)
            ->orderBy('created_at','dsc')
            ->get();
        $form_data = $form->formData($url,'PATCH',true);

        if($cltMdl_id === 'cliente_id') {
            $cliente = $clienteModelo;
            $imagen = $imgFt;
            return View::make('cliente.fotos.form', compact('cliente','galeria','imagen','form_data','action','paso'));
        } else {
            $modelo = $clienteModelo;
            $foto = $imgFt;
            return View::make('auto.modelo.fotos.form', compact('modelo','galeria','foto','form_data','action','paso'));
        }
    }
    /**
     * [Subir Multiples Imagenes al Servidor]
     * @param  [type] $id     [cliente / modelo]
     * @param  [string] $modelo [imagen / foto]
     * @return [boolean]         [true / false]
     */
    public function multiplesImagenes($id,$modelo)
    {
        $file = Input::file('ruta_imagen');
        $bitacora = new Bitacora;

        if(Input::hasFile('ruta_imagen')) {
            foreach($file as $key => $imagenes) {
                if($modelo == 'imagen')
                    $archivo = new Imagen;
                else
                    $archivo = new Foto;

                $archivo->ruta_imagen = $imagenes->getClientOriginalName();
                $imagenes->move("assets/img",$imagenes->getClientOriginalName());

                if($modelo == 'imagen') {
                    $archivo->cliente_id = $id;
                    $archivo->save();
                    $bitacora->Guardar(3,$archivo->id,1);
                } else {
                    $archivo->modelo_id = $id;
                    $archivo->save();
                    $bitacora->Guardar(8,$archivo->id,1);
                }
            }
            return true;
        }
        return false;
    }
    /**
     * [Borrar Imagen]
     * @param [modelo] $imgFt         [Imagen] [Foto]
     * @param [modelo] $clienteModelo [Modelo] [Cliente]
     * @param  [type] $numTabla      [Bitacora]
     */
    public function borrarImagen($imgFt,$clienteModelo,$numTabla)
    {
        $bitacora = new Bitacora;

        if(is_null($clienteModelo))
            App::abort(404);

        $imgFt->delete();
        $bitacora->Guardar($numTabla,$clienteModelo->id,3);
    }
    public function showImg($id,$campo)
    {
        if($campo == 'cliente_id') {
            $imagen = Imagen::where($campo,$id)
                ->get();
        } else {
            $imagen = Foto::where($campo,$id)
                ->get();
        }

        if(!empty($imagen))
            return $imagen;
        else
            return 0;
    }
}