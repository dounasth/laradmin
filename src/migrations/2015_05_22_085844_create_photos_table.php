<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('photos', function($table) {
            $table->increments('id');
            $table->string('path', 255)->unique();
            $table->string('link_type', 255);
            $table->bigInteger('imageable_id');
            $table->string('imageable_type', 255);
            $table->timestamps();
            $table->softDeletes();

            $table->index('path');
            $table->index('link_type');
            $table->index('imageable_id');
            $table->index('imageable_type');
            $table->index('imageable_id', 'imageable_type');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
