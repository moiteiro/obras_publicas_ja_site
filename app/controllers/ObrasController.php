<?php 

class ObrasController extends BaseController {

	public function __construct() 
	{
	}

	public function index() {
		$input = Input::all();

		$obras = [];

		if (isset($input['estado'])) {
			$estado = Estado::where('nome', '=', $input['estado'])->get()->first();

			if ($estado != NULL)
				$obras = $estado->obras()->paginate(10);

		} else {
			$obras = Obra::paginate(10);
		}

		return View::make('obras.index', compact('input', 'obras'));
	}

	public function show($id) {
		$obra = Obra::findOrFail($id);
		return View::make('obras.show', compact('obra'));
	}
}

 ?>