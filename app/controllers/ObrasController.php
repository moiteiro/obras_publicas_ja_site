<?php 

class ObrasController extends BaseController {

	public function __construct() 
	{
	}

	public function index() {
		return View::make('obras.index');
	}

	public function show($id) {
		$obra = Obra::findOrFail($id);
		return View::make('obras.show', compact('obra'));
	}
}

 ?>