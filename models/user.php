<?php

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;
class User extends Eloquent{
    
    public function posts(){
		return $this->has_many('Dojo\Models\Article');
    }
}

