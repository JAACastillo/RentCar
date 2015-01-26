<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */

	public function index(){
		$user = User::orderBy('created_at','dsc')
			->where('empresa_id', Auth::user()->empresa->id)
			->paginate();
        return View::make('user.list', compact('user'));
	}

	public function create(){
		$user = new User;
		$form = new Formulario;
		$form_data = $form->formData('usuarioSave','POST',false);
        $data = [
        	'' => '',
            'Administrador' => 'Administrador',
            'Empleado' => 'Empleado',
            'Cliente' => 'Cliente'
            ];

        return View::make('user.form', compact('user','form_data','data'));
	}

	public function store()	{
        $user = new User;
        $data = Input::all();
        $data['empresa_id'] = Auth::user()->empresa->id;
        if($user->validAndSave($data)) {
        	return Redirect::route('usuarios');
        } else
        	return Redirect::back()
        		->withInput()
        		->withErrors($user->errors);
	}

	public function show($id)
	{
		//

	}

	public function edit($id){
		$user = User::find($id);
        if(is_null($user))
            App::abort(404);
		$form = new Formulario;
		$form_data = $form->formData(array('usuarioUpdate', $id),'PATCH',false);
		if(Auth::user()->tipo == 'Administrador')
			$data = [
				'Administrador' => 'Administrador',
				'Empleado' => 'Empleado',
            	'Cliente' => 'Cliente'
			];
		elseif(Auth::user()->tipo == 'Empleado')
			$data = [
				'Empleado' => 'Empleado'
			];
        return  View::make('user.form', compact('data','user','form_data'));
	}


	public function update($id){
        $user = User::find($id);
        if(is_null($user))
            App::abort(404);
        $data = Input::all();
		if($user->validAndSave($data,2)) {
			return Redirect::route('usuarios');
		} else
			return Redirect::route('usuarioEditar', $user->id)
				->withInput()
				->withErrors($user->errors);
	}

	public function destroy($id){
        $user = User::find($id);

        if (is_null($user))
            App::abort(404);
        else {
            $user->delete();
            $bitacora = new Bitacora;
            $bitacora->Guardar(1,$id,3);
        }
	}
}