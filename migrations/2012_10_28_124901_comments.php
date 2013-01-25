<?php

class Dojo_Comments {

	/**
	 * Make changes to the database
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments', function($table){
            $table->increments('id');
            $table->string('email',50);
            $table->string('username',25);
            $table->string('title',50);
            $table->text('comment_body');
            $table->integer('accepted')->default(0);
            $table->integer('checked')->default(0);
            $table->integer('article_id');
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
        Schema::drop('comments');
	}

}
