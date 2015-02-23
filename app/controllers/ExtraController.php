<?php

use Illuminate\Filesystem\Filesystem;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class ExtraController extends \BaseController {
	
	protected $file;

	public function __construct(Filesystem $file){
		$this->file = $file;
	}



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
        	$data['imagen'] = $this->saveLogo();
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


	private function saveLogo(){
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
			    $s3->upload('carros', 'extras/' . $filename, \File::get($destinationPath . $filename));

				\File::delete($destinationPath . $filename);
			    // $resource = fopen('/path/to/file', 'r');
			} catch (S3Exception $e) {
			    // echo "There was an error uploading the file.\n";
			    return "";
			}
			return $filename;
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