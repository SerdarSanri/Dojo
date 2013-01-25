<?php 

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;
class Article extends Eloquent{
    public static $timestamps = true;
    public function author(){
        return $this->belongs_to('Admin','author_id');
    }

    public function tags(){
        return $this->has_many_and_belongs_to('Tag');
    }
}
