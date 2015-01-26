<?php
class modeloPaso_2Controller extends BaseController
{
	/**
     * [Subir Fotos del Modelo] [Paso 2]
     * @return [vista] [auto/modelos/fotos/form]
     */
	public function subirFoto($id)
	{
		$archivo = new SubirArchivo;
        $modelo = Modelo::find($id);
        $foto = new Foto;
        $vista = $archivo->ImagenesFotos($modelo,$foto,'modelo_id',$id,array('modeloUpload',$id),'Crear',2);
        return $vista;
	}
    /**
     * [Subir Multiples Imagenes]
     * @param  [type] $id [Id del Modelo]
     * @return [type]     [description]
     */
 	public function upload($id)
	{
        $archivo = new SubirArchivo;

        if($archivo->multiplesImagenes($id,'foto'))
            return Redirect::back();
        else
            return Redirect::route('modeloFoto',$id)
                ->with('mensaje','No se ha cargado ninguna imagen');
	}
    /**
     * [Cambiar Imagen]
     * @param  [type] $id [ID de la Foto]
     * @return [vista] [auto/modelos/fotos/form]
     */
    public function change($id)
    {
        $archivo = new SubirArchivo;
        $foto = Foto::find($id);

        if(is_null($foto))
            App::abort(404);

        $modelo = Modelo::find($foto->modelo_id);
        $vista = $archivo->ImagenesFotos($modelo,$foto,'modelo_id',$modelo->id,array('modeloReUpload',$id),'Editar',2);
        return $vista;
    }
    /**
     * [Reemplazar Imagen]
     * @param  [type] $id [ID de la Foto]
     * @return [vista] [auto/modelos/fotos/form]
     */
    public function reUpload($id)
    {
        $archivo = new SubirArchivo;
        $foto = Foto::find($id);

        if(is_null($foto))
            App::abort(404);

        $modelo = Modelo::find($foto->modelo_id);
        $vista = $archivo->ImagenFoto($foto,$modelo);
        return $vista;
    }
    /**
     * [Borrar Imagen]
     * @param  [type] $id [ID de la Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    public function delete($id)
    {
        $archivo = new SubirArchivo;
        $foto = Foto::find($id);

        if(is_null($foto))
            App::abort(404);

        $modelo = Modelo::find($foto->modelo_id);
        $archivo->borrarImagen($foto,$modelo,8);
        return Redirect::route('modeloFoto',$modelo->id);
    }
    /**
     * [Mostrar Imagenes]
     * @param  [type] $id [ID del Cliente]
     * @return [type]     [JSON]
     */
    public function showImg($id) {
        $archivo = new SubirArchivo;
        return $archivo->showImg($id,'modelo_id');
    }
}