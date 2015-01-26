<?php

class PrecioController extends BaseController {


	public function index($id){
		$carro = carro::find($id);
		return $this->show(new Precio, $carro, array('precioGuardar', $id), 'POST');
	}

	private function show($precio, $carro, $url, $metodo){
		if(is_null($carro))
		    App::abort(404);

		$precios = $carro->precios;
		
		$form = new Formulario;
		$form_data = $form->formData($url,$metodo,false);
		$paso = 3;
		return View::make('auto.carros.precios', compact('carro','precios','precio','form_data','paso'));
	}

	public function guardar($id){
		return $this->save(new Precio, $id);
	}

	public function editar($id){
		$precio = Precio::find($id);
		$carro  = $precio->carro;
		return $this->show($precio, $carro, array('precioUpdate', $id), "PATCH");
	}
	public function update($id){
		$precio = Precio::find($id);
		$carro  = $precio->carro;
		return $this->save($precio, $carro->id); 
	}

	private function save($precio, $id){
		$data = Input::all();
		$data['carro_id'] = $id;
		if($precio->validAndSave($data))
			return Redirect::back();
		return Redirect::back()->withErrors($precio->errors)->withInput();
	}
}