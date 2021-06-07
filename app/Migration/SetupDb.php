<?php

namespace App\Migration;

use App\Core\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class SetupDb extends Migration
{
	public static function create()
	{
		require __DIR__ . '/../../vendor/autoload.php';
		require __DIR__ . '/../config/database.php';

		Capsule::schema()->create(
			'users',
			function (Blueprint $table) {
				$table->increments('id');
				$table->string('email')->unique();
				$table->string('password');
				$table->timestamps();
			}
		);
	}

}