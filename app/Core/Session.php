<?php


namespace App\Core;


class Session
{


	/**
	 * Store
	 *
	 * @param string $key
	 * @param mixed  $data
	 *
	 * @return void
	 */
	public static function store(string $key, mixed $data): void
	{
		$_SESSION[$key] = $data;

	}//end store()


	/**
	 * Get
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public static function get(string $key): mixed
	{
		return $_SESSION[$key] ?? NULL;

	}//end get()


}