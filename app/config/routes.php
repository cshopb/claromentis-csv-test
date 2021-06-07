<?php

use App\routes\Routes;

include __DIR__ . '/../routes/Routes.php';

$requestUri = explode('?', $_SERVER['REQUEST_URI'])[0];
if ($requestUri === '/') {
	$requestUri = __LOGIN_PAGE__;
}

$routes = new Routes();

$route = $routes->registerRoutes();
$route->resolveRequest($_SERVER['REQUEST_METHOD'], $requestUri, $_REQUEST);