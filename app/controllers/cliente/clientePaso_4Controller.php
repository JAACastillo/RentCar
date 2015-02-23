<?php

require 'vendor/autoload.php';
use Illuminate\Filesystem\Filesystem;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


class clientePaso_4Controller extends BaseController
{
   
   protected $file;

   public function __construct(Filesystem $file){
    $this->file = $file;
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
          try {
            $s3 = S3Client::factory(
                    array(
                            'driver' => 's3',
                            'key'    => env('S3_KEY'),
                            'secret' => env('S3_SECRET'),
                            // 'region' => 'US Standard',
                            'bucket' => env('S3_BUCKET')

                        )
                );
            $file = Input::file('imagen');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'imagenes/';
            $file->move($destinationPath, $filename);
            $s3->upload('carros', 'documentos/' . $filename, \File::get($destinationPath . $filename);
            \File::delete($destinationPath . $filename);
              // $resource = fopen('/path/to/file', 'r');
          } catch (S3Exception $e) {
              // echo "There was an error uploading the file.\n";
              return "";
          }
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


    public function mostrarImagen($nombre){
        return  View::make('imagen', compact('nombre'));
    }



















}