<?php

namespace App\Core;


abstract class View
{

	/**
	 * Render
	 *
	 * @param       $view
	 * @param array $viewData
	 *
	 * @return void
	 */
	public static function render($view, $viewData = []): void
	{
		ob_start();
		require_once '../app/Views/' . $view . '.php';
		$layout = ob_get_clean();

		require_once '../app/Views/index.php';
	}

}