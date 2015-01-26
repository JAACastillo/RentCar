<?php

class ExtraController extends \BaseController {


	public function index()

	{
		$extra = Extra::orderBy('created_at','dsc')
					  ->where('empresa_id', Auth::user()->empresa->id)
					->paginate();
        return View::make('extra/list', compact('extra'));
	}


	public function create()
	{
		$extra = new Extra;
		$form = new Formulario;
		$form_data = $form->formData('extraSave','POST',true);
        return View::make('extra/form', compact('extra','form_data'));
	}

	public function store()
	{
        return $this->save(new Extra);
	}


	public function show($id) 
	{
        $extra = Extra::find($id);
        return View::make('extra/show', compact('extra'));
	}

	public function edit($id)
	{
   		$extra = Extra::find($id);
		$form = new Formulario;
        if(is_null($extra))
        	App::abort(404);

		$form_data = $form->formData(array('extraUpdate', $id),'PATCH',true);
        return View::make('extra/form', compact('extra','form_data'));
	}


	private function save($extra){
		$data = Input::all();
        $file = Input::file('imagen');

        if(Input::file('imagen')) {
        	$data['imagen'] = Input::file('imagen')->getClientOriginalName();
        	$file->move("assets/img",$data['imagen']);
        } elseif($extra->exists)
        	$data['imagen'] = $extra->imagen;
        else
        	$data['imagen'] = 'nodisponible.png';

		if(empty($data['obligatorio']))		$data['obligatorio'] = 0;
		if(empty($data['cobro']))  			$data['cobro'] = 0;
		$data['empresa_id'] = Auth::user()->empresa->id;

		if($extra->validAndSave($data))
		{
			return Redirect::route('extra');

		} else
            return Redirect::back()
                ->withInput()
                ->withErrors($extra->errors);
	}

	public function update($id)
	{
		$extra = Extra::find($id);
		if(is_null($extra))
            App::abort(404);
        return $this->save($extra);

	}

	public function destroy($id)
	{
        $extra = Extra::find($id);
        if(is_null($extra))
            App::abort(404);
		// $extra->delete();
		$extra->activo = !$extra->activo;
		$extra->save();

	}

}