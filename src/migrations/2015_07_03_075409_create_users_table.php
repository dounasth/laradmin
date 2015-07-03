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
			$table->text('email')->unique();
			$table->text('password');
			$table->text('permissions')->nullable();
			$table->integer('activated')->default(0);
			$table->text('activation_code')->nullable()->index();
			$table->decimal('activated_at', 10, 0)->nullable();
			$table->decimal('last_login', 10, 0)->nullable();
			$table->text('persist_code')->nullable();
			$table->text('reset_password_code')->nullable()->index();
			$table->text('remember_token')->nullable();
			$table->text('first_name')->nullable();
			$table->text('last_name')->nullable();
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
