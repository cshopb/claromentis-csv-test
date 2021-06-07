<?php


namespace App\routes;


use App\Controllers\FileController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use App\Core\Route;

class Routes
{

	private Route $route;


	/**
	 * Routes constructor.
	 */
	public function __construct()
	{
		$this->route = new Route();
	}


	/**
	 * Register Routes
	 *
	 * @return Route
	 */
	public function registerRoutes(): Route
	{
		$this->route->get(__LOGIN_PAGE__, LoginController::class, 'index');
		$this->route->post(__LOGIN_PAGE__, UserController::class, 'login');

		$this->route->get('/home/index', HomeController::class, 'index');

		$this->route->post('/file/upload', FileController::class, 'upload');
		$this->route->get('/file/download', FileController::class, 'download');

		return $this->route;
	}

}