<?php

	class TipoController extends BaseController

    {

        /**

         * [Tabla de Tipos]

         * @return [vista] [auto/tipo/list]

         */

        public function lista()

        {

            $tipo = Tipo::orderBy('created_at','dsc')

                ->paginate();



            $form_data = [

                'class' => 'form-horizontal',

                'id' => 'formTipo'

            ];



            $mensaje = 'El campo no tiene que quedar vacío';

            return View::make('auto.tipo.list', compact('tipo','form_data','mensaje'));

        }

        /**

         * [Guardar Datos Del Tipo]

         * @return [vista] [auto/tipo/list]

         */

        public function store()

        {

            $tipo = new Tipo;

            $data = Input::all();



            if($tipo->validAndSave($data)) {

                $bitacora = new Bitacora;

                $bitacora->Guardar(5,$tipo->id,1);

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

            $tipo = Tipo::find($id);



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

            $tipo = Tipo::find($id);



            if(is_null($tipo))

                App::abort(404);



            $data = Input::all();



            if($tipo->validAndSave($data)) {

                $bitacora = new Bitacora;

                $bitacora->Guardar(5,$tipo->id,2);

                return Redirect::back()

                    ->with('mensaje','El Tipo ha sido editada con éxito')

                    ->with('clase', 'alert-success');

            } else

                return Redirect::back()

                    ->with('mensaje','El campo no tiene que estar vacío')

                    ->with('clase', 'alert-danger');

        }

	}