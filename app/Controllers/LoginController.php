<?php

namespace App\Controllers;


use App\Core\Controller;
use App\Core\View;

class LoginController extends Controller
{

	/**
	 * Index
	 *
	 * @param array $errors
	 *
	 * @return void
	 */
	public function index(array $errors = []): void
	{
		View::render('login/index', $errors);
	}

}