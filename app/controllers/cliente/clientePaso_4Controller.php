<?php
class clientePaso_4Controller extends BaseController
{
    /**
     * [Subir Fotos del Cliente] [Paso 4]
     * @return [vista] [cliente/fotos/form]
     */
    public function subirFoto($id)
    {
        $archivo = new SubirArchivo;
        $cliente = Cliente::find($id);
        $imagen = new Imagen;
        $vista = $archivo->ImagenesFotos($cliente,$imagen,'cliente_id',$id,array('clienteUpload',$id),'Crear',4);
        return $vista;
    }
    /**
     * [Subir Multiples Imagenes]
     * @param  [type] $id [Id del Cliente]
     * @return [type]     [description]
     */
    public function upload($id)
    {
        $archivo = new SubirArchivo;

        if($archivo->multiplesImagenes($id,'imagen'))
            return Redirect::back();
        else
            return Redirect::route('clienteFoto',$id)
                ->with('mensaje','No se ha cargado ninguna imagen');
    }
    /**
     * [Cambiar Imagen]
     * @param  [type] $id [ID de la Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    public function change($id)
    {
        $archivo = new SubirArchivo;
        $imagen = Imagen::find($id);

        if(is_null($imagen))
            App::abort(404);

        $cliente = Cliente::find($imagen->cliente_id);
        $vista = $archivo->ImagenesFotos($cliente,$imagen,'cliente_id',$cliente->id,array('clienteReUpload',$id),'Editar',4);
        return $vista;
    }
    /**
     * [Reemplazar Imagen]
     * @param  [type] $id [ID de la Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    public function reUpload($id)
    {
        $imagen = Imagen::find($id);
        $bitacora = new Bitacora;

        if(is_null($imagen))
            App::abort(404);

        $cliente = Cliente::find($imagen->cliente_id);
        $file = Input::file('ruta_imagen');

        if(Input::file('ruta_imagen')) {
            $img = $file->getClientOriginalName();
            $file->move("assets/img",$img);
        } else
            $img = $imagen->ruta_imagen;

        $imagen->ruta_imagen = $img;
        $imagen->save();
        $bitacora->Guardar(3,$imagen->id,1);
        return Redirect::route('clienteFoto',$cliente->id);
    }
    /**
     * [Borrar Imagen]
     * @param  [type] $id [ID de la Imagen]
     * @return [vista] [cliente/fotos/form]
     */
    public function delete($id)
    {
        $archivo = new SubirArchivo;
        $imagen = Imagen::find($id);

        if(is_null($imagen))
            App::abort(404);

        $cliente = Cliente::find($imagen->cliente_id);
        $archivo->borrarImagen($imagen,$cliente,3);
        return Redirect::route('clienteFoto',$cliente->id);
    }
    /**
     * [Mostrar Imagenes]
     * @param  [type] $id [ID del Cliente]
     * @return [type]     [JSON]
     */
    public function showImg($id) {
        $archivo = new SubirArchivo;
        return $archivo->showImg($id,'cliente_id');
    }

    //nuevo paso 4

    public function verDocumentos($id){
        return $this->showInformacion($id, new documento, "POST");
    }

    public function showInformacion($id, $documento, $metodo){
        $cliente = Cliente::find($id);
        $documentos = $cliente->documentos;
        $paso = 4;
        $tipoDocumentos = tipoDocumento::lists('tipo', 'id');

        $form = new Formulario;
        $formData = $form->formData(array('guardarDocumento',$id), $metodo,true);
        // $documento = new documento;

        return View::make('cliente/formularios/documentos', compact('cliente', 'documento', 'formData','documentos', 'tipoDocumentos','paso'));

    }



    public function saveDocumento($id){
        // $cliente = Cliente::find($id);
        // if(is_null($cliente))
        //     App::abort(404);
        $data = Input::all();
        $data['Cliente_id'] =  $id;

        $documento = new documento;
        $data['imagen'] = $this->saveImage(null);

        if($documento->validAndSave($data)){
            return Redirect::back();
        }

        return Redirect::back()
                        ->withErrors($documento->errors)
                        ->withInput();
    }

    public function editDocumento($id){
        $documento = documento::find($id);
        // return $documento->cliente;
        return $this->showInformacion($documento->id, $documento, "PATCH");
    }

    private function saveImage($imagen){
        if(Input::hasFile('imagen')){
            $file = Input::file('imagen');
            $destinationPath = 'assets/images/documentos/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            // $data['imagen'] = $filename;
            return $filename;
        }
        return $imagen;
    }

    public function updateDocumento($id){
        $documento = documento::find($id);
        $data = Input::all();
        $data['imagen'] = $this->saveImage($documento->imagen);
        if ($documento->validAndSave($data)) 
            return Redirect::route('clienteInformacion', $documento->cliente->id);

        return Redirect::back()
                        ->withInput()
                        ->withErrors($documento->errors);
    }




















}