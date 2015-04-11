 <?php

class prestamosController extends BaseController{
	public function index(){
		$prestamos = Prestamo::with('cliente','carro', 'estado','extras', 'carro.modelo', 'carro.modelo.marca')
							 ->where('empresa_id', Auth::user()->empresa->id)
							 ->orderBy('created_at','dsc')
            				 ->paginate();

    //Revisar luego para poder mostrar el precio en la lista de las reservas
          foreach ($prestamos as $prestamo) {
          	$prestamo->valor = round($prestamo->precio * $prestamo->dias + ($prestamo->precio / 24 * $prestamo->horas),2);
          	foreach ($prestamo->extras as $extra) {
          		// return round($extra->cantidad($prestamo->dias,$prestamo->horas),2);
          		$prestamo->valor += round($extra->cantidad($prestamo->dias,$prestamo->horas, $prestamo->cobroPorHora),2);
          	}
          }

// $my_id = 23435; // get the ID from MySQL for example;
// $base62 = Math::to_base($my_id, 62);


// $base62 = 'b6H8Jk2';
// $decimal = Math::to_base_10($base62, 62);

        // $prestamo= $prestamos[0];
        // $codigo = Math::to_base($prestamo->id + 1000000, 62);

        // return $codigo;

        return View::make('prestamo.list', compact('prestamos'));
	}


  //de aqui para abajo sera usado para lo pasos del 5 en adelante


  //paso 5
    public function contrato($id){
      $prestamo = Prestamo::with('carro', 'extras', 'extras.definicion', 'carro.modelo', 'carro.modelo.marca', 'cliente')
                          ->find($id);
      $conductores = [
          $prestamo->cliente->id => $prestamo->cliente->nombre,
          // if($prestamo->cliente->conductor)
            // $prestamo->cliente->conductor->id => $prestamo->cliente->conductor->nombre
      ];

     
      if($prestamo->cliente->conductor)
        array_push($conductores,[$prestamo->cliente->conductor->id => $prestamo->cliente->conductor->nombre]);
      $paso = 5;
      $form = new Formulario;
      $formData = $form->formData(array('prestamoContrato',$id),'POST',false);

    //Habra que editar esto para mostrar solo los carros que no esten reservados o entregado a los clientes.
      $placas = $prestamo->carro->placas()->lists('numero', 'id');

      return View::make('prestamo.contrato', compact('prestamo', 'paso', 'placas', 'formData', 'conductores'));
    }

    public function contratoSave($id){
      $prestamo = Prestamo::find($id);
      $data = Input::all();
      // return $data;
      if($prestamo->validarContrato($data)){
        if($prestamo->estado_id == 5){
            $prestamo->estado_id = 6;
            $prestamo->save();
          }
        return Redirect::back();
      }
      // return "error";
      return Redirect::back()->withInput()
                      ->withErrors($prestamo->errors);
    }

    public function contratoImprimir($id){
      $prestamo = Prestamo::find($id); 
      $pdf = App::make('dompdf');

      $this->datosCliente($prestamo->cliente, array('Pasaporte', 'Licencia', 'Tarjeta', 'Documento'));
 $empresa = Auth::user()->empresa;
      if($prestamo->cliente_id != $prestamo->conductor_id) //para agregar lis datos del conductor adicional
      {
          $this->datosCliente($prestamo->conductor, array('Documento', 'Licencia'));
          $prestamo['conductorNombre'] = $prestamo->conductor->nombre;
          $prestamo['conductorLicencia'] = $prestamo->conductor->Licencia;
          $prestamo['conductorLicenciaVencimiento'] = $prestamo->conductor->LicenciaVencimiento;
          $prestamo['conductorLicenciaEmision'] = $prestamo->conductor->LicenciaEmision;

          $prestamo['conductorDocumento'] = $prestamo->conductor->Documento;
      }

      // return $prestamo;

      $pdf->loadView('pdfs.contrato', compact('prestamo', 'empresa'))->setPaper('legal');
      return $pdf->stream();
    }

    public function pagare($id){
      $prestamo = Prestamo::find($id);
      $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
      $pdf->loadView('pdfs.pagare', compact('prestamo'));
      return $pdf->stream();
    }


    private function datosCliente(&$cliente, $documentos){
      foreach ($documentos as $documento) {
        $doc = $cliente->datosDocumento($documento);
        if($doc){
          $cliente[$documento]                  = $doc->numero;
          $cliente[$documento . 'Emision']      = $doc->emision;
          $cliente[$documento . 'Vencimiento']  = $doc->vencimiento;
        }
      }
      return $cliente;
    }
  //end paso 5

    //paso 6
    public function recibir($id){
      $prestamo = Prestamo::find($id);
      $paso = 6;
      return View::make('prestamo.recibir', compact('prestamo', 'paso'));
    }

    public function recibido($id){
      $prestamo = Prestamo::find($id);
      $prestamo->estado_id = 7;
      $prestamo->save();

      return Redirect::back();
    }
    //end paso 6




}