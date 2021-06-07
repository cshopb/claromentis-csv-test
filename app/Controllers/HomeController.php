<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class HomeController extends Controller
{

	/**
	 * Index
	 *
	 * @return void
	 */
    public function index(): void
	{
        View::render('home/index');
    }
}