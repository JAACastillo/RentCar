<?php

class ColorController extends BaseController{
	public function lista(){
	    $colores = Color::orderBy('id','dsc')->paginate();
	    return View::make('color.list', compact('colores'));
	}

	public function nuevo()
	{
		$color = new Color;
	    return View::make('color.modal.form', compact('color'));
	}
	public function store(){
	    $color = new Color;
	    return $this->save($color);
	}

	public function edit($id){
	    $color = Color::find($id);
	    if(is_null($color))
	        App::abort(404);
	    return View::make('color.modal.form', compact('color'));
	}

	public function update($id){
	    $color = Color::find($id);
	    if(is_null($color))
	        App::abort(404);
	    return $this->save($color);
	}

	private function save($color){
	    $data = Input::all();
	    if($color->validAndSave($data)) {              
	        return Redirect::route('colores')
	            ->with('mensaje','El Tipo ha sido editada con éxito')
	            ->with('clase', 'alert-success');
	    }
	    return Redirect::back()
	            ->with('mensaje','El campo no tiene que estar vacío')
	            ->with('clase', 'alert-danger');

	}
}