<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesTable extends Migration {

	public function up()
	{
		Schema::create('movies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 200)->unique();
			$table->string('description', 1000);
			$table->integer('rate');
			$table->string('image', 500);
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('movies');
	}
}