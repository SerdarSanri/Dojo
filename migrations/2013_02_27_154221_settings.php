<?php

class Dojo_Settings {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('value');
			$table->boolean('enable');
		});

		DB::table('settings')->insert(array('name' => 'twitter','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'facebook','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'linkedin','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'youtube','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'github','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'gplus','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'bitbucket','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'number_of_posts','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'maintance','value'=>'','enable'=>'0'));
		DB::table('settings')->insert(array('name' => 'register','value'=>'','enable'=>'0'));
		
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