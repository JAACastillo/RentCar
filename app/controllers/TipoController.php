<?php

	class TipoController extends BaseController

    {
        public function lista(){

            $tipo = Modelo::orderBy('id','dsc')               ->paginate();
            $form_data = [
                'class' => 'form-horizontal',
                'id' => 'formTipo'
            ];

            $mensaje = 'El campo no tiene que quedar vacío';
            $marcas  = Marca::lists('nombre', 'id');

            return View::make('auto.tipo.list', compact('tipo','form_data','mensaje', 'marcas'));
        }

        /**

         * [Guardar Datos Del Tipo]

         * @return [vista] [auto/tipo/list]

         */

        public function store()

        {

            $tipo = new Modelo;

            $data = Input::all();



            if($tipo->validAndSave($data)) {

              

                return Redirect::back()

                    ->with('mensaje','El Tipo ha sido creada con éxito')

                    ->with('clase', 'alert-success');

            } else

                return Redirect::back()

                    ->with('mensaje','El campo no tiene que estar vacío')

                    ->with('clase', 'alert-danger');

        }

        /**

         * [Editar Tipo] [Formulario]

         * @param  [type] $id [ID del Tipo]

         * @return [type]     [JSON]

         */

        public function edit($id)

        {

            $tipo = Modelo::find($id);



            if(!empty($tipo))

                return $tipo;

            else

                return 0;

        }

        /**

         * [Actualizar Datos]

         * @param  [type] $id [ID del Tipo]

         * @return [vista] [auto/tipo/list]

         */

        public function update($id)

        {

            $tipo = Modelo::find($id);



            if(is_null($tipo))

                App::abort(404);



            $data = Input::all();



            if($tipo->validAndSave($data)) {

              
                return Redirect::back()

                    ->with('mensaje','El Tipo ha sido editada con éxito')

                    ->with('clase', 'alert-success');

            } else

                return Redirect::back()

                    ->with('mensaje','El campo no tiene que estar vacío')

                    ->with('clase', 'alert-danger');

        }

	}