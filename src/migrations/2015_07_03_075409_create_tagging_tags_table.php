<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggingTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagging_tags', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('slug')->index();
			$table->string('name');
			$table->boolean('suggest')->default(0);
			$table->integer('count')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagging_tags');
	}

}
