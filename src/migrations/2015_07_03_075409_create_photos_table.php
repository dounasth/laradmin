<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('path', 255)->index();
			$table->string('link_type');
			$table->integer('imageable_id')->index();
			$table->string('imageable_type', 255)->index();
			$table->decimal('created_at', 10, 0);
			$table->decimal('updated_at', 10, 0);
			$table->decimal('deleted_at', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}
