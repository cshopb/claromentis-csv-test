<?php

namespace App\Core;


use App\Models\Auth;

abstract class Controller
{


	public function __construct()
	{
		if ($_SERVER['REQUEST_URI'] !== __LOGIN_PAGE__ && Auth::isAuthenticated() === FALSE) {
			Redirect::to(__LOGIN_PAGE__, 403);
		}
	}


	/**
	 * Call Method
	 *
	 * @param string $method
	 * @param array  $params
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function callMethod(string $method, array $params = []): void
	{
		if (method_exists($this, $method) === FALSE) {
			throw new \Exception(
				'Controller: ' . get_class($this) . ' method not defined: ' . $method,
				500
			);
		}

		$this->$method($params);
	}


}