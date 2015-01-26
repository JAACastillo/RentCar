<?php

class ProspectoController extends BaseController

{
    public function lista()
    {
        $prospectos = Cliente::where('como','prospecto')
                             ->where('empresa_id', Auth::user()->empresa->id)
                             ->orderBy('created_at','dsc')
                             ->paginate();

        return View::make('prospecto.list', compact('prospectos'));
    }

    public function create()
    {
        return $this->form(new Cliente, 'prospectoStore', 'POST');
    }

    public function store(){
        return $this->save(new Cliente);
    }
    public function edit($id){
        $cliente = Cliente::find($id);
        if(is_null($cliente))
            App::abort(404);
        return $this->form($cliente, array('prospectoUpdate', $id), 'PATCH');
    }
    public function update($id){
        $cliente = Cliente::find($id);
        if(is_null($cliente))
            App::abort(404);
        return $this->save($cliente);
    }

    private function form($cliente, $url, $metodo){
        $form = new Formulario;
        $form_data = $form->formData($url, $metodo, false);

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

        return View::make('prospecto.form', compact('cliente','form_data','sexo', 'tipo'));
    }
    private function save($cliente){
        $data = Input::all();
        $data['como']       = 2; //Guardando como propesto
        $data['empresa_id'] = Auth::user()->empresa->id;

        if($cliente->validarCliente($data)) 
            return Redirect::route('prospectoList');
        
        return Redirect::back()
            ->withInput()
            ->withErrors($cliente->errors);
    }



    public function show($id) {
        $prospecto = Cliente::find($id);
        if(is_null($prospecto))
            App::abort(404);
        return View::make('prospecto.show', compact('prospecto'));
    }

    public function destroy($id)
    {
        $prospecto = Prospecto::find($id);
        if (is_null($prospecto))
            App::abort(404);

        $prospecto->delete();
    }


    public function convertir($id) {
        $cliente = Cliente::find($id);
        if (is_null($cliente))
            App::abort(404);
        $cliente->como = 1; //1 = Cliente
        $cliente->save();

        return Redirect::route('clienteEditar',$cliente->id);
    }
}