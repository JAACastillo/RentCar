<?php

class CarroController extends BaseController {


	public function index(){
		$carros = carro::with('tipo','modelo', 'modelo.marca')
						->where('empresa_id', Auth::user()->empresa->id)->paginate();
		return View::make('auto.carros.list', compact('carros'));
	}

	public function nuevo(){
		return $this->formulario(new carro, "POST", 'carroGuardar', 1);
	}

	public function guardar(){
		return $this->saveCarro(new carro);
	}

	public function editar($id){
		$carro = carro::find($id);
		$carro->marca_id = $carro->modelo->marca->id;//$carro->modelo->marca->id;
		return $this->formulario($carro, 'PATCH', array('carroUpdate', $id), 4);
	}
	public function update($id){
		$carro = carro::find($id);
		return $this->saveCarro($carro);
	}

	//function usada para verificar que los datos del carro cumplan con las reglas establecidad.
	//ya sea a la hora de querer crear un nuevo carro o cuando se quiere editar alguna que ya existe.
	private function saveCarro($carro){
		$data = Input::all();
		$data['empresa_id'] = Auth::user()->empresa->id;
		// $data['estado'] = 'Disponible';
		$data['imagen'] = $this->saveImage($carro);

			// return $data;
			if($carro->validAndSave($data)) {
			    return Redirect::back();
			}
		

		return Redirect::back()
		        ->withInput()
		        ->withErrors($carro->errors);
	}

	//formulario que se usa para mostrar la informacion de los carros.
	//funciona tambien cuando se quiere crear uno nuevo o cuando se quiere editar, necesita 3 parametros para funcionar
	private function formulario($carro, $metodo, $url, $paso){

		$form = new Formulario;
		$form_data = $form->formData($url,$metodo,true);
		$marcas = Marca::all();//lists('nombre','id');
		$marca = $marcas->lists('nombre', 'id');
		// return $marca;

		$modelos = $marcas[0]->modelos()->lists('nombre', 'id');

		$tipo =[
		    '' => '',
		    'Tipos' => TipoCarro::all()->lists('nombre','id')
		];

		$transmision = ["Manual"	=> "Manual","Automatico"	=> "Automatico"];

		$colores = Color::lists('color', 'id');
		$combustibles = Combustible::lists('nombre', 'id');

		// $paso = 1;
		return View::make('auto.carros.form', compact('carro','form_data','marca','tipo','paso', 'transmision', 'colores', 'combustibles', 'modelos'));
	}


	private function saveImage($carro){
		if(Input::hasFile('imagen')){
		// return $data;
			// $data['data'] = $this->saveCarro();
			$file = Input::file('imagen');
			$destinationPath = 'assets/images/carros/';
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);

			return $filename;
		}
		return $carro->imagen;

	}

	//Mantenimiento
	public function manto($id){
		$manto = new Cliente;
		$form = new Formulario;
		$paso = 5;
		$carro = Carro::find($id);
		// $carros = $carro->lists('','id');
		$carros = [
				'' => 'Seleccione el numero de placa',
				'Placas Disponibles' =>	$carro->placas()->lists('numero', 'id')
			];
		// return $carros;

		$tipos = tipoMantenimiento::lists('nombre', 'id');//['1' => 'Aceite', '2' => 'Reparacion'];

		$formData = $form->formData('mantoSave', 'POST',false);

		return View::make('auto.carros.manto', compact('manto', 'formData', 'paso', 'carro', 'tipos', 'carros'));
	}

	public function mantoSave(){
		$manto = new mantenimiento;
		if($manto->validAndSave(Input::all()))
			return Redirect::back();

		return Redirect::back()
						->withInput()
						->withErrors($manto->errors);
	}
	//End Mantenimiento

}