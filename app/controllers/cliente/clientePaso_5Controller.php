<?php
class clientePaso_5Controller extends BaseController
{
    /**
     * [Crear Comentario] [Formulario] [Paso 5]
     * @return [vista] [cliente/formularios/comentario]
     */
    public function comentarios($id)
    {
        $cliente = Cliente::find($id);
        if(is_null($cliente))
            App::abort(404);

        $comentarios = $cliente->comentarios;
        $comentario = new Comentario;

        $form = new Formulario;
        $form_data = $form->formData(array('comentarioStore',$id),'POST',false);
        $paso = 5;
        return View::make('cliente.formularios.comentarios', compact('cliente','form_data','paso', 'comentario', 'comentarios'));
    }

    public function verComentarios($id){
        $cliente = Cliente::find($id);
            // $comentarios = $cliente->comentarios;
    }


    /**
     * [Guardar Comentario]
     * @return [type] [description]
     */
    public function storage($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $data = Input::all();
        $data['Cliente_id'] = $id;

        // return $data;

        $comentario  = new Comentario;

        if($comentario->validAndSave($data))
            return Redirect::route('clienteComentario', $id);

        return Redirect::back()
                        ->withInput()
                        ->withErrors($comentario->errors);
    }
}