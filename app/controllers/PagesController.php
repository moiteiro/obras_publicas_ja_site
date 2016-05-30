<?php 

class PagesController extends BaseController {

	public function __construct() 
	{
	}

	public function home()
	{
		$obras_mais_vistas = Obra::take(4)->get();
		return View::make('pages.home', compact('obras_mais_vistas'));
	}
}

 ?>