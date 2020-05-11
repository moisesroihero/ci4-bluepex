<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        echo view('templates/header');
        echo view('templates/nav-bar');
        echo view('templates/home');
        echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
