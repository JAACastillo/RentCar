 <?php
class prestamoPaso_3Controller extends BaseController
{


    public function index($id){
        $prestamo = Prestamo::with('lugarEntrega','lugarDevolucion', 'extras', 'extras.definicion', 'carro', 'carro.modelo','carro.modelo.marca')
                            ->find($id);
        if(is_null($prestamo))
            App::abort(404);

        $paso = 3;
        $extras =   Extra::where('empresa_id', Auth::user()->empresa->id)
                    ->where('activo', 1)
                    ->get();
        return View::make('prestamo/extra',compact('prestamo','extras','paso'));
    }

    public function add($id, $idExtra){
        $extra = Extra::find($idExtra);
        $newExtra = new prestamoExtra;
        $newExtra->prestamo_id  = $id;
        $newExtra->extra_id     = $idExtra;
        $newExtra->unaVez       = $extra->cobro;
        $newExtra->precio       = $extra->precio;
        $newExtra->save();

        $prestamo = Prestamo::find($id);
        if($prestamo->estado_id == 2)
        {
            $prestamo->estado_id = 4;
            $prestamo->save();
        }

        return Redirect::back();

    }

    public function delete($id){
        $extra = prestamoExtra::find($id);
        $extra->delete();
        return Redirect::back();
    }



    /**
     * [Seleccionar Accesorios]
     * @param  [type] $id [ID del prestamo]
     * @return [vista]     [prestamo/extra]
     */
    public function select($id)
    {
        $form = new Formulario;
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $form_data = $form->formData(array('extraStore',$id),'PATCH',false);
        $extra = Extra::all();

        $data = '';
        $lista = [''=> ''];

        foreach ($prestamo->extras as $key => $pivote)
            $data[] = $pivote->pivot->extra_id;

        if($data != '') {
            foreach (Extra::find($data)->lists('extra','id') as $key => $valor)
                $lista[$key] = $valor;
        }

        $paso = 3;
        return View::make('prestamo/extra',compact('prestamo','form_data','extra','lista','paso'));
    }
    /**
     * [Guardar Datos Del Prestamo] [Extras]
     * @return [route] [FormaPago]
     */
    public function store($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        $data = Input::get('checkbox_extras');

        if(!is_null($data)) {
            foreach ($data as $key => $extra_id) {
                $extra = Extra::find($extra_id);
                $prestamo->extras()->attach($extra);
            }
        }
        return Redirect::route('formaPago',$prestamo->id);
    }
    /**
     * [Quitar Accesorio]
     * @param  [type] $prestamo_id [ID del Prestamo]
     * @param  [type] $extra_id    [ID del Extra]
     * @return [route] [selectExtra]
     */
    public function quitar($prestamo_id,$extra_id)
    {
        $prestamo = Prestamo::find($prestamo_id);

        if(is_null($prestamo))
            App::abort(404);

        $extra = Extra::find($extra_id);
        $prestamo->extras()->detach($extra);
        return Redirect::route('selectExtras',$prestamo->id);
    }
}