<?php


namespace App\Core;


class Route
{
	private array $routes = [];


	/**
	 * Get
	 *
	 * @param string $route
	 * @param string $controller
	 * @param string $method
	 *
	 * @return void
	 */
	public function get(string $route, string $controller, string $method): void
	{
		$this->setRoute(
			'get',
			$route,
			$controller,
			$method
		);

	}//end get()


	/**
	 * Post
	 *
	 * @param string $route
	 * @param string $controller
	 * @param string $method
	 *
	 * @return void
	 */
	public function post(string $route, string $controller, string $method): void
	{
		$this->setRoute(
			'post',
			$route,
			$controller,
			$method
		);

	}//end post()


	/**
	 * Resolve Request
	 *
	 * @param string $requestMethod
	 * @param string $route
	 * @param array  $request
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function resolveRequest(string $requestMethod, string $route, array $request): void
	{
		$routeDetails = $this->routes[$requestMethod][$route];

		$this->execute(
			$routeDetails['controller'],
			$routeDetails['method'],
			$request,
		);

	}//end resolveRequest()


	/**
	 * Execute
	 *
	 * @param string $controllerName
	 * @param string $method
	 * @param array  $params
	 *
	 * @return void
	 * @throws \Exception
	 */
	private function execute(string $controllerName, string $method, array $params = []): void
	{
		/* @var \App\Core\Controller $controller */
		$controller = new $controllerName();
		$controller->callMethod($method, $params);
	}


	/**
	 * Set Route
	 *
	 * @param string $requestMethod
	 * @param string $route
	 * @param string $controller
	 * @param string $method
	 *
	 * @return void
	 */
	private function setRoute(
		string $requestMethod,
		string $route,
		string $controller,
		string $method,
	): void {
		$requestMethod = strtoupper($requestMethod);

		$this->routes[$requestMethod][$route] = [
			'controller' => $controller,
			'method'     => $method
		];

	}//end ()


}