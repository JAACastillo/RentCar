<?php

	class TipoController extends BaseController

    {
        public function lista(){

            $tipo = Modelo::orderBy('id','dsc')->paginate();
            $form_data = [
                'class' => 'form-horizontal',
                'id' => 'formTipo'
            ];

            $mensaje = 'El campo no tiene que quedar vacío';
            $marcas  = Marca::lists('nombre', 'id');

            return View::make('auto.tipo.list', compact('tipo','form_data','mensaje', 'marcas'));
        }

        public function store(){
            $tipo = new Modelo;
            return $this->save($tipo);
        }

        public function edit($id){
            $tipo = Modelo::find($id);
            if(!empty($tipo))
                return $tipo;
            return false;
        }

        public function update($id){
            $tipo = Modelo::find($id);
            if(is_null($tipo))
                App::abort(404);
            return $this->save($tipo);
        }

        private function save($tipo){
            $data = Input::all();
            if($tipo->validAndSave($data)) {              
                return Redirect::back()
                    ->with('mensaje','El Tipo ha sido editada con éxito')
                    ->with('clase', 'alert-success');
            }
            return Redirect::back()
                    ->with('mensaje','El campo no tiene que estar vacío')
                    ->with('clase', 'alert-danger');

        }

	}