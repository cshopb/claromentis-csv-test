<?php

namespace App\Models;


use App\Core\Session;

class Auth
{

	private const AUTH_FIELDS = [
		'userNameField' => 'email',
		'passwordField' => 'password',
	];


	/**
	 * Authenticate
	 *
	 * @param array $request
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public static function authenticate(array $request): bool
	{
		$errors = [];
		foreach (static::AUTH_FIELDS as $authField) {
			if (empty(trim($request[$authField]))) {
				$errors[] = $authField;
			} else {
				$$authField = trim($request[$authField]);
			}
		}//end foreach

		if (count($errors) > 0) {
			throw new \Exception(
				static::generateErrorMessage($errors),
				422
			);
		}

		$userNameField = static::AUTH_FIELDS['userNameField'];
		$user          = static::findUser($$userNameField, $userNameField);

		$passwordField = static::AUTH_FIELDS['passwordField'];
		if (password_verify($$passwordField, $user->$passwordField) === FALSE) {
			throw new \Exception(static::generateErrorMessage(['No matching record.']), 422);
		}

		Session::store('loggedin', 'mvcLoggedIn');

		return TRUE;
	}


	/**
	 * Is Authenticated
	 *
	 * @return bool
	 */
	public static function isAuthenticated(): bool
	{
		return Session::get('loggedin') === 'mvcLoggedIn';
	}


	/**
	 * Generate Error Message
	 *
	 * @param array $errors
	 *
	 * @return string
	 * @throws \JsonException
	 */
	private static function generateErrorMessage(array $errors): string
	{
		return json_encode($errors, JSON_THROW_ON_ERROR);

	}//end generateErrorMessage()


	/**
	 * Find UserController
	 *
	 * @param string $searchedUserName
	 * @param string $userNameField
	 *
	 * @return User
	 * @throws \Exception
	 */
	private static function findUser(string $searchedUserName, string $userNameField): User
	{
		$user = User::where(
			$userNameField,
			'=',
			$searchedUserName
		)->first();

		if ($user === NULL) {
			throw new \Exception(static::generateErrorMessage(['No matching record.']), 422);
		}

		return $user;

	}//end findUser()

}