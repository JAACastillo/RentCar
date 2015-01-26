<?php

class modeloPaso_1Controller extends BaseController

{

    /**
     * [Tabla de Modelos]
     * @return [vista] [auto/modelo/list
     */

    public function lista()

    {

        $modelo = Modelo::orderBy('created_at','dsc')

            ->paginate();



        return View::make('auto.modelo.list', compact('modelo'));

    }

    /**

     * [Crear Modelo] [Formulario] [Paso 1]

     * @return [vista] [auto/modelo/form]

     */

    public function create()

    {

        $modelo = new Modelo;

        $form = new Formulario;

        $form_data = $form->formData('modeloStore','POST',false);



        $marca = [

            '' => '',

            'Marcas' => Marca::all()->lists('marca','id')

        ];



        $tipo =[

            '' => '',

            'Tipos' => Tipo::all()->lists('tipo','id')

        ];



        $paso = 1;

        return View::make('auto.modelo.form', compact('modelo','form_data','marca','tipo','paso'));

    }

    /**

     * [Guardar Datos Del Modelo]

     * @return [Controller] [function] [subirFoto]

     */

    public function store()

    {

        $modelo = new Modelo;

        $data = Input::all();

        $data['estado'] = 'Disponible';



        if($modelo->validAndSave($data)) {

            $bitacora = new Bitacora;

            $bitacora->Guardar(6,$modelo->id,1);

            return Redirect::route('modeloFoto',$modelo->id);

        } else

            return Redirect::route('modeloNuevo')

                ->withInput()

                ->withErrors($modelo->errors);

    }

    /**

     * [Editar Modelo] [Formulario] [Paso 1]

     * @param  [type] $id [ID del Modelo]

     * @return [vista] [auto/modelo/form]

     */

    public function edit($id)

    {

        $modelo = Modelo::find($id);

        $form = new Formulario;



        if(is_null($modelo))

            App::abort(404);



        $form_data = $form->formData(array('modeloUpdate',$id),'PATCH',false);



        $marca = Marca::all()->lists('marca','id');

        $tipo = Tipo::all()->lists('tipo','id');

        $paso = 4;

        return View::make('auto.modelo.form', compact('modelo','form_data','marca','tipo','paso'));

    }

    /**

     * [Actualizar Datos]

     * @param  [type] $id [ID del Modelo]

     * @return [Controller] [function] [subirFoto]

     */

    public function update($id)

    {

        $modelo = Modelo::find($id);



        if(is_null($modelo))

            App::abort(404);



        $data = Input::all();



        if($modelo->validAndSave($data)) {

            $bitacora = new Bitacora;

            $bitacora->Guardar(6,$modelo->id,2);

            return Redirect::route('modeloFoto',$modelo->id);

        } else

            return Redirect::route('modeloNuevo')

                ->withInput()

                ->withErrors($modelo->errors);

    }

    /**

     * [Mostrar Detalles del Modelo]

     * @param  [type] $id [description]

     * @return [vista] [auto/modelo/show]

     */

    public function show($id)

    {

        $modelo = Modelo::find($id);



        if(is_null($modelo))

            App::abort(404);





        $galeria = Foto::where('modelo_id',$id)

            ->orderBy('ruta_imagen','asc')

            ->get();



        $precio = Precio::where('modelo_id',$id)

            ->orderBy('created_at','dsc')

            ->paginate();



        return View::make('auto.modelo.show', compact('modelo','galeria','precio'));

    }
}