<?php 

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;
class Article extends Eloquent{

    public static $timestamps = true;

    public function author(){
        return $this->belongs_to('Dojo\Models\User','author_id');
    }

    public function tags(){
        return $this->has_many_and_belongs_to('Dojo\Models\Tag');
    }

    public static function get_order($field,$value,$order){
    	$articles = Article::order_by($order,'asc')->where($field,'=',$value)->get();
    	return $articles;

    }

    public static function get_query($field,$value){
    	$articles = Article::where($field,'=',$value)->get();
    	return $articles;
    }

    public static function get_totals($field,$value){
    	$total = Article::where($field,'=',$value)->count();
  		return $total ;
    }

    public static function post_update($field,$value,$id){

    	$article = Article::find($id);
    	$article->$field = $value;
    	$article->save();

    }

    public static function post_delete($id){
    	$article = Article::with('author')->find($id);
    	$article->delete();
    }
}
