 <?php 

class PlacasController extends BaseController{
	public function index($id){
		$carro = carro::find($id);
		return $this->show($carro, new placa, array('placaGuardar',$id), 'POST');
	}

	public function guardar($id){
		return $this->save(new Placa,$id);
	}


	private function show($carro, $placa, $url, $metodo){
		
		$placas = $carro->placas;
		$paso = 2;
		$form = new Formulario;
		$formData = $form->formData($url, $metodo, false);
		return View::make('auto.carros.placas', compact('placa', 'placas', 'formData', 'paso', 'carro'));
	}
	private function save($placa, $id){
		$data = Input::all();
		$data['carro_id'] = $id;

		if($placa->validAndSave($data))
			return Redirect::route('carroPlacas', $id);

		return Redirect::back()->withInput()->withErrors($placa->errors);
	}

	public function editar($id){
		$placa = Placa::find($id);
		$carro = $placa->carro;
		// return 'hola';
		return $this->show($carro, $placa, array('placaUpdate',$id), 'PATCH');
	}
	public function update($id){
		$placa = Placa::find($id);
		$carro = $placa->carro;

		return $this->save($placa, $carro->id);
	}

	public function destroy($id){
		$placa = Placa::find($id);
		$placa->activo = !$placa->activo;
		$placa->save();
		return Response::json(array('yes', 200));
	}
}