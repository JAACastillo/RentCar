<?php
class reservacionController extends BaseController
{
    /**
     * [Tabla de Prestamo]
     * @return [vista] [prestamo/list]
     */
   
    public function create(){
        date_default_timezone_set('America/El_Salvador');
        $prestamo = new Prestamo;
        $prestamo->fechaReserva = date("Y-m-d H:i:s");
        $prestamo->fechaDevolucion = date("Y-m-d H:i:s");

        return $this->crearReserva($prestamo, "POST", "prestamoStore", 1);
    }

    private function crearReserva($prestamo, $metodo, $ruta, $paso){
         $form = new Formulario;
         $form_data = $form->formData($ruta,$metodo,false);
         
        $cliente = Cliente::where('tipo', 'local')
                                   ->where('empresa_id', Auth::user()->empresa->id)
                                   ->orWhere('tipo', 'extrangero')
                                   ->orderBy('created_at','dsc')
                                   ->lists('nombre', 'id');

         $lugares = Lugares::lists('nombre', 'id');//where('empresa_id', Auth::user()->empresa->id)->lists('nombre', 'id');

         $entrega = $lugares; //$prestamo->formLugares();
         $devolucion = $lugares; //$prestamo->formLugares();
         return View::make('prestamo/form', compact('prestamo','form_data','cliente','entrega','devolucion','paso'));
    }

    public function store(){

        $prestamo = new Prestamo;
        $data = Input::all();
        $data['empresa_id'] = Auth::user()->empresa->id;
        $data['estado_id'] = 1;
        // $data = $prestamo->fechaYmd($data);

        //return date('Y-m-d h:i A', strtotime($data['fechaDevolucion']));
        if($prestamo->validarPrestamo($data)) {

            $this->agregarExtras($prestamo);
            return Redirect::route('selectModelo',$prestamo->id);
        }        

        return Redirect::back()
            ->withInput()
            ->withErrors($prestamo->errors);
    }
    public function edit($id) {
        $form = new Formulario;
        // $listas = new Prestamo;x
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);

        return $this->crearReserva($prestamo, "PATCH", array('prestamoUpdate',$id), 1);  
    }

    private function agregarExtras($prestamo){
        
    $matchThese = ['empresa_id' => Auth::user()->empresa->id, 'obligatorio' => '1', 'activo' => '1'];
      $extras  = Extra::where($matchThese)->get();

        // var_dump($extras);
        // $extras = Extra::whereRaw("SELECT * FROM `extras` WHERE `obligatorio` =1 AND `obligatorio` =1 AND `activo` = 1 AND 'empresa_id' = " . Auth::user()->empresa->id)
        //                     ->get();
                        // return $extras;
        foreach ($extras as $extra) {
            # code...
            prestamoExtra::create(array(
                    'extra_id'      => $extra->id,
                    'prestamo_id'   => $prestamo->id,
                    'precio'        => $extra->precio,
                    'unaVez'        => $extra->cobro
                ));

        }
        return true;
    }


    public function update($id) {
        $prestamo = Prestamo::find($id);
        if(is_null($prestamo))
            App::abort(404);

        $data = Input::all();

        // return $data;
        if($prestamo->validarPrestamo($data,1)) {
            return Redirect::route('selectModelo', $prestamo->id);//route('selectModelo',$prestamo->id);

        } 
        return Redirect::back()
                ->withInput()
                ->withErrors($prestamo->errors);

    }

    public function show($id) {
        $prestamo = Prestamo::find($id);
        return View::make('prestamo.review', compact('prestamo'));
    }

    public function confirmar($id)
    {
        $prestamo = Prestamo::find($id);

        if(is_null($prestamo))
            App::abort(404);
        $prestamo->estado_id = 4;
        $prestamo->save();
        // Mail::send('emails.reservado', array('prestamo' => $prestamo), function($message) use ($prestamo)
        // {
        //     $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)->subject('Prestamo aprobado ' . $prestamo->carro->modelo->nombre);
        // });

        return Redirect::route('formaPago',$id);
    }


    public function requerimiento($id) {
        $prestamo = Prestamo::find($id);
        if(is_null($prestamo))
            App::abort(404);

        $estado = [ 'estado' => 'esto es una prueba'];
        Mail::send('prestamo.email.requerimiento',$estado,function($message) use ($prestamo) {
            $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)
                ->subject('MultiAutos El Salvador');
        });

        $prestamo->estado = 'Reservado';
        $prestamo->save();
        $bitacora = new Bitacora;
        $bitacora->Guardar(10,$prestamo->id,2);
        return Redirect::route('prestamoLista');

    }
    /**
     * [Borrar Prestamo]
     * @param  [type] $id [ID del Prestamo]
     * @return [vista] [prestamo/list]
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::find($id);

        if (is_null($prestamo))
            App::abort(404);
        $prestamo->cancelado = !$prestamo->cancelado;
        $prestamo->save();
        return Response::json(array('success' => 'success'),200);
        // $prestamo->delete();
        // $bitacora = new Bitacora;
        // $bitacora->Guardar(10,$id,3);
    }
}