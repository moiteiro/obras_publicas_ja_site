<?php 

class PagesController extends BaseController {

	public function __construct() 
	{
	}

	public function home()
	{
		$obras_mais_vistas = Obra::all();
		return View::make('pages.home', compact('obras_mais_vistas'));
	}
}

 ?>