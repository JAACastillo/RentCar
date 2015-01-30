<?php
class clientePaso_1Controller extends BaseController
{
    /**
     * [Tabla de Clientes]
     * @return [vista] [cliente/list]
     */
    public function lista()
    {
        $cliente = Cliente::where('empresa_id', Auth::user()->empresa->id)
                            ->where('como', 'cliente')
                            ->orderBy('created_at','dsc')
                            ->paginate();

        return View::make('cliente.list', compact('cliente'));
    }
    /**
     * [Crear Clientes] [Formulario] [Paso 1]
     * @return [vista] [cliente/formularios/cliente]
     */
    public function create()
    {
        $cliente = new Cliente;
        $form = new Formulario;
        $form_data = $form->formData('clienteStore','POST',false);

        $sexo = [
            '' => '',
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        ];

        $tipo = [
            '' => '',
            'Local' => 'Local',
            'Extrangero' => 'Extrangero'
        ];


        $paso = 1;
        return View::make('cliente.formularios.cliente', compact('cliente','form_data','sexo','tipo','paso'));
    }
    /**
     * [Guardar Datos Del Cliente]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function store()
    {
        $cliente = new Cliente;
        $form = new Formulario;
        $data = Input::all();
        $data['empresa_id'] = Auth::user()->empresa->id;

        if($cliente->validarCliente($data))
        {
            return Redirect::route('clienteContacto',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
    /**
     * [Editar Clientes] [Formulario] [Paso 1]
     * @param  [type] $id [ID del Cliente]
     * @return [vista] [cliente/formularios/cliente]
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $form = new Formulario;

        if(is_null($cliente))
            App::abort(404);

        $form_data = $form->formData(array('clienteUpdate',$id),'PATCH',false);

        $sexo = [
            '' => '',
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        ];

        $tipo = [
            '' => '',
            'Local' => 'Local',
            'Extrangero' => 'Extrangero'
        ];

        $cliente = $cliente->fechaDmy($cliente);
        $paso = 6;
        // return $cliente->telefono;
        return View::make('cliente.formularios.cliente', compact('cliente','form_data','sexo','tipo','paso'));
    }
    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID del Cliente]
     * @return [vista] [cliente/formularios/contacto]
     */
    public function update($id)
    {
        $cliente = Cliente::find($id);
        $form = new Formulario;

        if(is_null($cliente))
            App::abort(404);

        $data = Input::all();

        if($cliente->validarCliente($data)) { 
            return Redirect::route('clienteContacto',$cliente->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($cliente->errors);
    }
    /**
     * [Mostrar Detalles del Cliente]
     * @param  [type] $id [description]
     * @return [vista] [cliente/show]
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
            App::abort(404);

        // $cliente = $cliente->fechaDmy($cliente);

     
     
        $this->datosCliente($cliente, array('Pasaporte', 'Licencia', 'Tarjeta', 'Documento'));
       
        $prestamos = Prestamo::where('cliente_id',$id)
            ->orderBy('fechaReserva','dsc')
            ->paginate();

        return View::make('cliente/show', compact('cliente','prestamos'));
    }

     private function datosCliente(&$cliente, $documentos){
      foreach ($documentos as $documento) {
        $doc = $cliente->datosDocumento($documento);
        if($doc){
          $cliente[$documento]                  = $doc->numero;
          $cliente[$documento . 'Emision']      = $doc->emision;
          $cliente[$documento . 'Vencimiento']  = $doc->vencimiento;
        }
      }
      return $cliente;
    }
}
