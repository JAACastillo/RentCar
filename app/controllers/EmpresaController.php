<?php


class EmpresaController extends BaseController{
	public function lista(){
		if(Auth::user()->empresa->id == 1)
			$empresas = Empresa::all();
		else
			$empresas = Empresa::where('id',Auth::user()->empresa->id)->get();

		return View::make('empresa.list', compact('empresas'));
	}


	public function nuevo(){
		$empresa = new Empresa;
		$form = new Formulario;
		$form_data = $form->formData('empresaSave','POST', true);


		return View::make('empresa.nuevo', compact('empresa', 'form_data'));
	}

	public function editar($id){
		if(Auth::user()->empresa->id == 1)
			$empresa = Empresa::find($id);
		else
			$empresa = Auth::user()->empresa;
		if(!$empresa->exists)
			App::abort(404);

		$form = new Formulario;
		$form_data = $form->formData(array('empresaUpdate', $empresa->id),'PATCH', true);

		return View::make('empresa.nuevo', compact('empresa', 'form_data'));

	}
	
	private function saveLogo($empresa){
		if(Input::hasFile('imagen')){
		// return $data;
			// $data['data'] = $this->saveCarro();
			$file = Input::file('imagen');
			$destinationPath = 'assets/images/logos/';
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);

			return $filename;
		}
		return $empresa->logo;

	}
	public function save(){
		return $this->guardar(new Empresa);
	}

	public function update($id){
		if(Auth::user()->empresa->id == 1)
			$empresa = Empresa::find($id);
		else
			$empresa = Auth::user()->empresa;
		if(!$empresa->exists)
			App::abort(404);
		return $this->guardar($empresa);
	}
	private function guardar($empresa){
		$data = Input::all();

		$data['logo'] = $this->saveLogo($empresa);

		// return $data;

		if($empresa->validAndSave($data)){
			return Redirect::route('empresas');
		}

		return Redirect::back()
						->withErrors($empresa->errors)
						->withInput();

	}
}