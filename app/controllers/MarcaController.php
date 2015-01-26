<?php

	class MarcaController extends BaseController

    {

    /**
     * [Tabla de Marcas]
     * @return [vista] [auto/marca/list]
     */

    public function lista()

    {

        $marca = Marca::orderBy('id','dsc')
            ->paginate();

        $form_data = [
            'class' => 'form-horizontal',
            'id' => 'formMarca'
        ];

        $mensaje = 'El campo no tiene que quedar vacío';
        return View::make('auto.marca.list', compact('marca','form_data','mensaje'));

    }

    /**
     * [Guardar Datos De la Marcas]
     * @return [vista] [auto/marca/list]
     */

    public function store()

    {

        $marca = new Marca;
        $data = Input::all();

        if($marca->validAndSave($data)) {
            return Redirect::back()
                ->with('mensaje','La marca ha sido creada con éxito')
                ->with('clase', 'alert-success');
        } 

        return Redirect::back()
            ->with('mensaje','El campo no tiene que estar vacío')
            ->with('clase', 'alert-danger');

    }

    /**
     * [Editar Marca] [Formulario]
     * @param  [type] $id [ID de la Marca]
     * @return [type]     [JSON]
     */

    public function edit($id)

    {

        $marca = Marca::find($id);
        if(!empty($marca))
            return $marca;
        else
            return 0;

    }

    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID de la Marca
     * @return [vista] [auto/marca/list]
     */

    public function update($id)

    {

        $marca = Marca::find($id);



        if(is_null($marca))

            App::abort(404);



        $data = Input::all();



        if($marca->validAndSave($data)) {
            return Redirect::back()
                ->with('mensaje','La marca ha sido editada con éxito')
                ->with('clase', 'alert-success');
        } 

        return Redirect::back()
            ->with('mensaje','El campo no tiene que estar vacío')
            ->with('clase', 'alert-danger');

    }

    /**
     * [Mostrar Detalles de la Marca]
     * @param  [type] $id [ID de la Marca]
     * @return [type]     [description]
     */

    public function show($id)

    {

        $marca = Marca::find($id);



        if(is_null($marca))

            App::abort(404);



        $nombreMarca = $marca->marca;



        $modelo = Modelo::where('marca_id',$marca->id)

            ->orderBy('modelo','asc')

            ->paginate();



        return View::make('auto.marca.show', compact('nombreMarca','modelo'));

    }

}