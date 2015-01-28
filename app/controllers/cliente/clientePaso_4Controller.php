<?php
class clientePaso_4Controller extends BaseController
{
   

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