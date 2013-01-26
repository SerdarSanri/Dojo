<?php 

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent{
	public static $table = 'settings';

	public function definition(){
		return $this->belongs_to('settings','id');
	}
}
