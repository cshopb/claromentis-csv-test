<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Redirect;
use App\Models\Auth;

class UserController extends Controller
{

	/**
	 * Create
	 *
	 * @param array $request
	 *
	 * @return void
	 * @throws \Exception
	 */
    public function create(array $request): void
	{
        $user = new \App\Models\User();
        $user->email = $request['email'];
        $user->password = password_hash($request['password'], PASSWORD_BCRYPT);
        $user->save();

        Auth::authenticate($request);

        Redirect::to('/home/index');
    }


	/**
	 * LoginController
	 *
	 * @param array $request
	 *
	 * @return void
	 * @throws \Exception
	 */
    public function login(array $request): void
    {
    	if (isset($request['createUser']) === TRUE) {
    		$this->create($request);
		}

    	try {
			if (Auth::authenticate($request) === FALSE) {
				Redirect::to(__LOGIN_PAGE__, 422);
			}

			Redirect::to('/home/index');
		} catch (\Exception $e) {
			$errors = json_decode(
				$e->getMessage(),
				TRUE,
				512,
				JSON_THROW_ON_ERROR
			);

			$login = new LoginController();
			$login->index($errors);
		}

    }
}