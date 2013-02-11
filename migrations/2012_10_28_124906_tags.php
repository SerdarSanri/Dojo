<?php

class Dojo_Tags {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('tags', function($table){
            $table->increments('id');
            $table->string('tag_name');
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
        Schema::drop('tags');
	}

}
