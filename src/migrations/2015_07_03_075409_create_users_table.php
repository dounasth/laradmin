<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email')->unique();
			$table->string('password');
			$table->string('permissions')->nullable();
			$table->integer('activated')->default(0);
			$table->string('activation_code')->nullable()->index();
			$table->decimal('activated_at', 10, 0)->nullable();
			$table->decimal('last_login', 10, 0)->nullable();
			$table->string('persist_code')->nullable();
			$table->string('reset_password_code')->nullable()->index();
			$table->string('remember_token')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->decimal('created_at', 10, 0);
			$table->decimal('updated_at', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
