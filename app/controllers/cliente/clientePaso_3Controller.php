 <?php
class clientePaso_3Controller extends BaseController
{
    /**
     * [Crear Contacto Adicional] [Formulario] [Paso 3]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function adicional($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $conductor = $cliente->conductor;
        // $cliente = $cliente->fechaDmy($cliente);
        if($conductor){
            $documento = $conductor->documentos()->where('tipoDocumento_id',4)->first();
            if(!empty($documento))
                $conductor->documento = $documento->numero;



            $licencia = $conductor->documentos()->where('tipoDocumento_id',2)->first();

            if($licencia){
                $conductor->licencia            = $licencia->numero;
                $conductor->fechaLicencia       = $licencia->emision;
                $conductor->fechaVencimiento    = $licencia->vencimiento;
            }
        }

        $form = new Formulario;
        $form_data = $form->formData(array('adicionalStore',$id),'PATCH',true);
        $paso = 3;
        return View::make('cliente.formularios.adicional', compact('conductor', 'cliente','form_data','paso'));
    }
    /**
     * [Guardar Datos Del Contacto]
     * @return [type] [description]
     */
    public function storage($id)
    {
        $form = new Formulario;
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        $conductor = $cliente->conductor;
        if(is_null($conductor))
            $conductor = new Cliente;
        // $form = new Formulario;
        $data = Input::all();
        $data['tipo'] = 'adicional';
        $data['empresa_id'] = Auth::user()->empresa->id;
        if($conductor->validarConductor($data)) {
            $cliente->adicional_id = $conductor->id;
            $cliente->save();

            $documento = $conductor->documentos()->where('tipoDocumento_id',4)->first();
            // return $documento;
            if(empty($documento))
            {
                $documento = new documento;
                $documento->tipoDocumento_id = 4;
                $documento->cliente_id = $conductor->id;
            }
            $documento->numero = Input::get('documento');            
            // return $documento;
            $documento->save();

            $licencia = $conductor->documentos()->where('tipoDocumento_id',2)->first();
            if(empty($licencia))
            {
                $licencia = new documento;
                $licencia->tipoDocumento_id = 2;
                $licencia->cliente_id = $conductor->id;
            }
            $licencia->numero       = Input::get('licencia');
            $licencia->emision      = Input::get('fechaLicencia');
            $licencia->vencimiento  = Input::get('fechaVencimiento');
            $licencia->save(); 
            // $documento->vencimiento = 


            return Redirect::route('clienteInformacion',$cliente->id);
        }
         // else
            return Redirect::back()
                ->withInput()
                ->withErrors($conductor->errors);
    }
}