<?php

namespace App\Core;

class App
{

	/**
	 * App constructor.
	 */
	public function __construct()
	{
		$this->requireConfig();
	}


	/**
	 * Require Config
	 *
	 * @return void
	 */
	public function requireConfig(): void
	{
		if (PHP_SAPI === 'cli') {
			$path = $_SERVER['PWD'] . '/app/config';
		} else {
			$path = '../app/config';
		}

		$files = array_diff(scandir($path), ['.', '..']);

		foreach ($files as $file) {
			require_once __DIR__ . '/../config/' . $file;
		}
	}

}