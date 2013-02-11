<?php

class Dojo_Projects {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('project_body');
			$table->string('slug',50);
            $table->integer('author_id');
            $table->string('cover',256);
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
