<?php

class Dojo_Articles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles',function($table){
            $table->increments('id');
            $table->string('title',255);
            $table->text('post_body');
            $table->string('slug',50);
            $table->integer('author_id');
            $table->string('cover',256);
            $table->integer('comments');
            $table->boolean('draft');
            $table->boolean('published');
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
		Schema::drop('articles');

	}

}