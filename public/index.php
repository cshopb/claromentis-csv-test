<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();

$protocol = 'https';
if (empty($_SERVER['HTTPS']) === TRUE) {
	$protocol = 'http';
}
define(
	'__ROOT__',
	$protocol . '://' . $_SERVER['HTTP_HOST']
);

const __LOGIN_PAGE__ = '/login';

$app = new App\Core\App;