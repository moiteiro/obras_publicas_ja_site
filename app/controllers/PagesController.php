<?php 

class PagesController extends BaseController {

	public function __construct() 
	{
	}

	public function home()
	{
		return View::make('pages.home');
	}
}

 ?>