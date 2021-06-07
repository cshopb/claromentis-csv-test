<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection(
	[
		'driver'      => 'mysql',
		'host'        => getenv('DB_HOST') ?: '127.0.0.1',
		'port'        => getenv('DB_PORT') ?: '3306',
		'database'    => getenv('DB_DATABASE') ?: 'mvc_test',
		'username'    => getenv('DB_USERNAME') ?: 'mvc_test',
		'password'    => getenv('DB_PASSWORD') ?: '',
		'unix_socket' => getenv('DB_SOCKET') ?: '',
		'charset'     => 'utf8mb4',
		'collation'   => 'utf8mb4_unicode_ci',
		'prefix'      => '',
		'strict'      => TRUE,
		'engine'      => NULL,
	]
);

$capsule->setAsGlobal();
$capsule->bootEloquent();