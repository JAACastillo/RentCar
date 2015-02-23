<?php
use Illuminate\Filesystem\Filesystem;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


class EmpresaController extends BaseController{
	protected $file;

	public function __construct(Filesystem $file){
		$this->file = $file;
	}

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
		try {
				$s3 = S3Client::factory(
						array(
								'driver' => 's3',
								'key'    => getenv('S3_KEY'),
								'secret' => getenv('S3_SECRET'),
								// 'region' => 'US Standard',
								'bucket' => getenv('S3_BUCKET')
							)
					);
				$file = Input::file('imagen');
				$filename = $file->getClientOriginalName();
				$destinationPath = 'imagenes/';
				$file->move($destinationPath, $filename);
				// $this->file->put('carros/' . $filename, \File::get($destinationPath . $filename));
			    $s3->upload('carros', 'logos/' . $filename, \File::get($destinationPath . $filename));

				\File::delete($destinationPath . $filename);
			    // $resource = fopen('/path/to/file', 'r');
			} catch (S3Exception $e) {
			    // echo "There was an error uploading the file.\n";
			    return "";
			}
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
			$this->crearUsuario($empresa);
			return Redirect::route('empresas');
		}

		return Redirect::back()
						->withErrors($empresa->errors)
						->withInput();

	}


	private function crearUsuario($empresa){
		$usuario = User::where('email', $empresa->email)->first();
		if(count($usuario) == 0)
			$usuario = new User;
		$usuario->nombre 		= $empresa->nombre;
		$usuario->email 		= $empresa->email;
		$usuario->tipo 			= "Administrador";
		$usuario->password 		= Hash::make(strtolower($empresa->email));
		$usuario->empresa_id	= $empresa->id;
		$usuario->save();
		
	}


}