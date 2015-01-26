<?php
class modeloPaso_3Controller extends BaseController
{
	/**
     * [Nuevo Precio] [Formulario] [Paso 3]
     * @return [vista] [auto/modelos/precios/form]
     */
    public function precio($id)
    {
        $modelo = Modelo::find($id);
        $form = new Formulario;

        if(is_null($modelo))
            App::abort(404);

        $lista = Precio::where('modelo_id',$id)
            ->orderBy('created_at','dsc')
            ->paginate();

        $precio = new Precio;
        $form_data = $form->formData(array('precioGuardar',$id),'PATCH',false);
        $paso = 3;
        return View::make('auto.modelo.precios.form', compact('modelo','lista','precio','form_data','paso'));
    }
    /**
     * [Guardar Datos Del Precio]
     * @return [vista] [auto/modelos/precios/form]
     */
    public function guardar($id)
    {
        $modelo = Modelo::find($id);
        $form = new Formulario;
        $precio = new Precio;

        if(is_null($modelo))
            App::abort(404);

        $data = Input::all();
        $data['modelo_id'] = $modelo->id;
        $data = $form->fechaYmd($data,3);

        if($precio->validAndSave($data)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(7,$precio->id,1);
            return Redirect::route('modeloPrecio',$id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($precio->errors);
    }
    /**
     * [Editar Precio] [Formulario] [Paso 3]
     * @param  [type] $id [ID del Precio]
     * @return [vista] [auto/modelo/precios/form]
     */
    public function editar($id)
    {
        $precio = Precio::find($id);
        $form = new Formulario;
        $form_data = $form->formData(array('precioActualizar',$id),'PATCH',false);

        if(is_null($precio))
            App::abort(404);

        $modelo = Modelo::find($precio->modelo_id);

        if(is_null($modelo))
            App::abort(404);

        $precio->fecha_ini = date('d-m-Y', strtotime($precio->fecha_ini));
        $precio->fecha_fin = date('d-m-Y', strtotime($precio->fecha_fin));

        $lista = Precio::where('modelo_id',$precio->modelo_id)
            ->orderBy('created_at','dsc')
            ->paginate();

        $paso = 3;
        return View::make('auto.modelo.precios.form', compact('modelo','lista','precio','form_data','paso'));
    }
    /**
     * [Actualizar Datos]
     * @param  [type] $id [ID del Precio]
     * @return [vista] [auto/modelo/precios/form]
     */
    public function actualizar($id)
    {
        $form = new Formulario;
        $precio = Precio::find($id);

        if(is_null($precio))
            App::abort(404);

        $modelo = Modelo::find($precio->modelo_id);

        if(is_null($modelo))
            App::abort(404);

        $data = Input::all();
        $data = $form->fechaYmd($data,3);

        if($precio->validAndSave($data)) {
            $bitacora = new Bitacora;
            $bitacora->Guardar(7,$precio->id,2);
            return Redirect::route('modeloPrecio',$modelo->id);
        } else
            return Redirect::back()
                ->withInput()
                ->withErrors($precio->errors);
        }
    /**
     * [Borrar Precio]
     * @param  [type] $id [ID del Precio]
     * @return [vista] [auto/modelo/precios/form]
     */
    public function destroy($id)
    {
        $precio = Precio::find($id);

        if(is_null($precio))
            App::abort(404);

        $modelo = Modelo::find($precio->modelo_id);

        if(is_null($modelo))
            App::abort(404);

        $precio->delete();
        $bitacora = new Bitacora;
        $bitacora->Guardar(7,$precio->id,3);
    }
}