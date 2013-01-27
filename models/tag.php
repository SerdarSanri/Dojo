<?php

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent, \Laravel\Input as Input;

class Tag extends Eloquent{

    public function articles(){
        return $this->has_many_and_belong_to('Article');
    }

    /*
     *@param array $tags tags to ensure existence of
     *@return array Tag instances
     */

    public static function prep($tags)
	{
		$results = Tag::where_in('tag_name', $tags)->get();
		$output = array();
		foreach($results as $tag)
		{
			$output[ $tag->tag_name ] = $tag;
		}
		foreach($tags as $tag)
		{
			if ( ! array_key_exists($tag, $output) )
			{
				$tag = Tag::create( array('tag_name' => $tag) );
				$output[ $tag->tag_name ] = $tag;
			}
		}
		return $output;
	}

	public static function input( $name )
	{
		$tags = explode(',', Input::get( $name ));
		$tags = array_map('trim', $tags);
		return Tag::prep($tags);
	}

	public function tagList($id){
		$results = Tag::where_in('article_id', $id)->get();
		$output = array();
		foreach($results as $tag)
		{
			$output[ $tag->tag_name] = $tag;
		}
	} 
}

    
