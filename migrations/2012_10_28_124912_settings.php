<?php

class Dojo_Settings {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('settings',function($table){
                $table->increments('id');
                $table->string('twitter',40);
                $table->string('facebook',40);
                $table->string('googleplus',60);
                $table->text('intro');
                $table->string('title',50);
                $table->string('subtitle',50);
                $table->string('cover',60);
                $table->string('github');
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
        Schema::drop('settings');
	}
}
