<?php
class clientePaso_2Controller extends BaseController
{
    /**
     * [Crear Contactos] [Formulario] [Paso 2]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function contacto($id)
    {
        $cliente = Cliente::find($id);

        $emergencia = $cliente->emergencia;
        // if(is_null($emergencia))
        //     App::abort(404);
        // return $emergencia;
        $form = new Formulario;
        $form_data = $form->formData(array('contactoStore',$id),'PATCH',false);
        $paso = 2;
        return View::make('cliente.formularios.contacto', compact('emergencia', 'cliente' ,'form_data','paso'));
    }
    /**
     * [Guardar Datos Del Contacto]
     * @return [vista] [cliente/foemularios/adicional]
     */
    public function storage($id)
    {
        $cliente = Cliente::find($id);
        $emergencia = $cliente->emergencia;//new Cliente;
        if(is_null($emergencia))
            $emergencia = new Cliente;
            // App::abort(404);
        $data = Input::all();
        $data['empresa_id'] = Auth::user()->empresa->id;
        $data['tipo'] = 'Emergencia';

        if($emergencia->validarEmergencia($data)) {
            // $cliente = Cliente::find($id);
            $cliente->emergencia_id = $emergencia->id;
            $cliente->save();
            return Redirect::route('clienteAdicional',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($emergencia->errors);
    }
}