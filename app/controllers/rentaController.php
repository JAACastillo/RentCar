 <?php

class rentaController extends BaseController{

	public function index(){
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        $clase = "left-slider two-column";
        $paso = 1;
        return View::make('renta.home', compact('lugares', 'clase', 'paso'));
	}

    public function chooseCar(){
        // return $carros;
        $lugares = Lugares::where('empresa_id', 1)//Auth::user()->empresa->id)
                            ->lists('nombre', 'id');
        $clase  = "page page-two-column";
        $paso = 2;
        return View::make('renta.chooseCar', compact('lugares', 'clase', 'paso'));
    }

    public function chooseExtras(){
        $clase  = "page page-two-column";
        $paso = 3;
        return View::make('renta.chooseExtra', compact('clase', 'paso'));
    }

    public function confirmacion(){
        $clase = "left-slider two-column";
        return View::make('renta.confirmacion', compact('clase'));
    }

    public function revisar(){
        $clase  = "page page-two-column";
        $paso = 4;
        return View::make('renta.revisar', compact('clase', 'paso'));
    }

    public function prestamoSave(){
        $prestamo = new Prestamo;
        $data = Input::all();
        $data['lugarEntrega_id'] = $data['lugarEntrega'];
        $data['lugarDevolucion_id'] = $data['lugarDevolucion'];
        $data['estado_id'] = 3;
        $data['empresa_id'] = 1;
        $data['cobroPorHora'] = false;

        // return $data;

        if($data['usuario']){
            $data['cliente_id'] = $this->searchCliente($data['usuario']);
        }else
            return Response::json(array("ERROR 201"), 401);

        if($data['carro']){
            $data['carro_id']  = $data['carro']['id'];
            $data['precio']  = $data['carro']['precio'];
       

            // return Response::json($data, 200);
            if($prestamo->validarPrestamo($data)){
                if($data['extras']){
                    // return Response::json($data['extras'], 200);
                    foreach ($data['extras'] as $key => $extra) {
                        $prestamoExtra = new prestamoExtra;
                        $prestamoExtra->extra_id    = $extra['id'];
                        $prestamoExtra->precio      = $extra['precio'];
                        $prestamoExtra->unaVez      = $extra['cobro'];
                        $prestamo->extras()->save($prestamoExtra);
                    }
                }
                //en esta parte habria que enviar un correo al cliente
                //con los datos de la reserva, diciendole que alguien se pondra en contacto con el para 
                //confirmar la reserva.
                Mail::send('emails.confirmacion.template', array('prestamo' => $prestamo), function($message) use ($prestamo)
                {
                    $message->to($prestamo->cliente->email, $prestamo->cliente->nombre)->subject('Confirmación de solicitud ' . $prestamo->carro->modelo->nombre);
                });
                return Response::json($prestamo, 201);
            }

            return Response::json($prestamo->errors,200);
        }
        return Response::json('No hay carro', 501);
    }

    private function searchCliente($usuario){
        //buscar clietne para conocer si este existe
        $cliente = Cliente::where('email',$usuario['email'])->first();
        if($cliente == []){
            $cliente = new Cliente;
            $cliente->nombre    = $usuario['nombre'] ;
            $cliente->telefono  = $usuario['telefono'];
            $cliente->email     = $usuario['email'];
            $cliente->como      = 2; 
            $cliente->empresa_id= 1;
            $cliente->save();

            $user = new User;
            $user->empresa_id = 1;
            $user->email        = $cliente->email;
            $user->tipo         = 'Cliente';
            $user->password     = Hash::make(strtolower($cliente->email)); //hay que enviar correo al cliente con la contrasena;
            $user->save();
        }
        return $cliente->id;
    }

//para angular
    public function carros($inicio, $fin){
        $prestamo = new prestamo;
        $prestamo->fechaReserva = $inicio;

        // return $inicio;
        $prestamo->fechaDevolucion = $fin;

        // return $prestamo;
        $carros = detalleCarro::where('fechaInicio', '<=', $prestamo->fechaInicio)
                                ->where('fechaFin', '>=', $prestamo->fechaFin)
                                ->groupBy('id')
                                ->orderBy('precio', 'asc')
                                ->paginate(2);
        return Response::json($carros, 200);
    }

    public function extras(){
        $extras = Extra::where('empresa_id', 1)
                    ->where('activo', 1)
                    ->paginate();

        return Response::json($extras, 200);
    }
    public function user(){

        if (Auth::check() && Auth::user()->tipo == 'Cliente') {
            $cliente = Auth::user();
            $cliente->email_confirmation = $cliente->email;
        }
        else
            $cliente = new Cliente;
        return Response::json($cliente, 200);
    }

    public function marcaCount(){
        $marcaCount = marcaCount::all();
        return Response::json($marcaCount, 200);
    }


    //regitrar e inicio de sesión-

    public function registrar(){
        $data = [
            'nombre'                => Input::get('nombre'),
            'email'                 => Input::get('email'),
            'password'              => Input::get('password'),
            'password_confirmation' => Input::get('password'),
            'tipo'                  => 'cliente',
            'empresa_id'            => 1,
            'como'                  => 'prospecto'
        ];

        // return Response::json($data, 200);
        $user = new User;
        if($user->validAndSave($data)){
            $cliente = new Cliente;
            $cliente->validarClienteRenta($data);
            return $this->iniciarSesion();
        }
        return Response::json($user->errors, 401);
    }

    public function iniciarSesion(){
        $userdata = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        if(Auth::attempt($userdata, Input::get('remember-me', false)))
            return Response::json("Aceptado", 200);
        return Response::json('Datos de acceso incorrectos', 401);
    }



}