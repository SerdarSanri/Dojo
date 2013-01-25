<?php

class Dojo_Article_Tag {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tag',function($table){
			$table->increments('id');
			$table->integer('article_id');
			$table->integer('tag_id');
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
		Schema::drop('article_tag');
	}

}
