<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggingTaggedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagging_tagged', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('taggable_id')->index();
			$table->string('taggable_type')->index();
			$table->string('tag_name');
			$table->string('tag_slug')->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagging_tagged');
	}

}
