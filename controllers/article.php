<?php
use Dojo\Models\Article, Dojo\Models\Tag;
class Dojo_Article_Controller extends Dojo_Base_Controller{

	public function get_index($type = "index", $id="all",$sorter = "ns"){
		



		//sorter and searcher for table
		if($type == "index" && $id== "all" && (preg_match("/^(title|created_at|author_id|draft|published)/", $sorter))){
			$articles = Article::order_by($sorter,'asc')->
get();
			$count = Article::count();

		}elseif ((preg_match("/^(draft|published)/", $type)) && (preg_match("/^(1|0)/",$id)) && $sorter == "ns") {
			
			$articles = Article::get_query($type,$id);
			$count =Article::get_totals($type,$id);

		}elseif((preg_match("/^(index|draft|published)/", $type)) && (preg_match("/^(1|0)/",$id)) && (preg_match("/^(title|published|author_id|draft|created_at|ns)/", $sorter))){
			$articles = Article::get_order($sorter,$type,$id);
			$count = Article::get_totals($type,$id);
		}else{
			$articles = Article::all();	
			$count = Article::count();

		}

		$this->layout->nest('content','dojo::articles.index',array(
			'articles'=>$articles,
			'count'=>$count,
		));
	}

	
	public function post_index(){
		$data = Input::all();
		$action = $data['action'];
		unset($data['action']);
		unset($data['csrf_token']);
		unset($data['index']);

		switch ($action) {
			case 'delete_selected':
				foreach ($data as $item) {
					
					Article::post_delete($item);
				}
				break;
			
			case 'publish_selected':
				foreach ($data as $item) {
					
					Article::post_update('published','1',$item);
				}
				break;

			case 'draft_selected':
				foreach ($data as $item) {
					
					Article::post_update('draft','1',$item);
				}
				break;

			default:
				# code...
				break;
		}

		return Redirect::to_route('dojo::index_article');
		
	}

	public function get_edit($id){
				$user = Auth::user();

		$article = Article::find($id);
		$this->layout->nest('content','dojo::articles.edit',array(
			'article'=>$article,
			'user'=>$user,
			
		));
	}

	public function put_edit(){
		$id = Input::get('id');
		$olddata = Article::find($id);
		$post_title = Input::get('title');
		$post_body = Input::get('post_body');
		$slug = Str::slug(Input::get('title'));
		$edit_info = array();

		if(strcmp($olddata->title, $post_title) != 0){
			$edit_info["title"] = $post_title;
		}
		if(strcmp($olddata->post_body, $post_body) != 0){
			$edit_info["post_body"] = $post_body;
		}
		if(strcmp($olddata->slug, $slug) != 0){
			$edit_info["slug"] = $slug;
		}

		$rules = array(
            'cover'  => 'image',
            'slug'  => 'unique:articles',
            'title' => 'unique:articles|min:3|max:255',
	    );

	    $validation = Validator::make($edit_info,$rules);
	    if($validation->fails()){
	    	return Redirect::to_route('dojo::edit_article',$id)
	    		->with_errors($validation);
	    }else{
	    	Article::update($id,$edit_info);
	    	return Redirect::to_route('dojo::index_article');
	    }
	}

	public function get_view($id){}

	public function get_erase($id){
		$success="Article deleted with success!";
        $article = Article::find($id);
        $article->delete();
        return Redirect::to_route('dojo::index_article')
            ->with('success',$success);
	}

	public function get_new(){
		$user = Auth::user();
		$this->layout->nest('content','dojo::articles.add',array(
    		'user'=>$user,
    	));
	}

	public function post_new(){
		$new_post =  array(
        'title'    => Input::get('post_title'),
        'post_body'     => Input::get('post_body'),
        'author_id'   => Input::get('post_author'),
        'slug' => Str::slug(Input::get('post_title')),
        'draft' => Input::get('draft'),
        'published' => Input::get('published'),
        );
    	
   
    	
	    $rules = array(
            'title'     => 'required|min:3|max:255',
            'cover'  => 'image',
            'title' => 'required|unique:articles',
	    );
	     
	    $validation = Validator::make($new_post, $rules);
	    if ( $validation -> fails() )
	    {
	        
 	        return Redirect::to('dojo/articles')
	                ->with('user', Auth::user())
	                ->with_errors($validation)
	                ->with_input();
        }else{
	        $tags = Tag::input('tags');
			$tag_ids = array_values( array_map(
				function($tag){ return $tag->id; },
				$tags
			));

	        $new_article = new Article($new_post);
		    $new_article->save();
		    $new_article->tags()->sync($tag_ids);

		    if(!empty($new_post['cover'])){
		          $img = Input::file('cover');
			      $directory = path('public').'uploads/thumbnails/articles/';
			      Input::upload('cover', $directory, Input::file('cover.name'));
			}
			// @todo: Fix upload bug , since when we dont specify a cover it will try upload something

		    return Redirect::to('dojo/articles/');
		}	
	}

	public function post_redactorupload(){
		$rules = array(
			'file' => 'image|max:100000'
		);

		$path = path('base');
		die($path);
		$validation = Validator::make(Input::all(), $rules);
		$file = Input::file('file');
		if($validation->fails()){
			return FALSE;
		}else{
			if(Input::upload('file','public/images/articles',$file['name'])){
				return Response::json(array('filelink'=>'images/' . $file['name']));
			}
			return FALSE;
		}

	}

}