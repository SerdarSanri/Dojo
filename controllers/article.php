<?php
use Dojo\Models\Article, Dojo\Models\Tag;
class Dojo_Article_Controller extends Dojo_Base_Controller{


	
	/**
	 * Get the list of articles to show in admin paneel , with optional sorting and filter search
	 * @param  string $type   type of filter (index/draft/published)
	 * @param  string $id     type of values we want search (all|0|1)
	 * @param  string $sorter type of order that we it will display results
	 * @return array $articles and $count   where $articles have all info about the articles we will show. And the $count it will display how many items we get
	 */
	
	public function get_index($type = "index", $id="all",$sorter = "ns"){
		$title = "List of articles";



		//sorter and searcher for table
		if($type == "index" && $id== "all" && (preg_match("/^(title|created_at|author_id|draft|published)/", $sorter))){
			$articles = Article::order_by($sorter,'asc')->get();
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

	

	/**
	 * Update/Delete post from articles table have support for multi choice
	 * @return string thats notices that articles were updated/modified
	 */
	
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

		return Redirect::to_route('dojo::index_article')
			->with('title','List of articles')
			->with('message','Article(s) Updated');
		
	}


	/**
	 * This function it will get the id of article that we want edit and present a page with the old data
	 * @param  integer $id id of the article we want to edit
	 * @return nothing
	 */
	
	public function get_edit($id){
		
		$user = Auth::user();

		$article = Article::find($id);
		$this->layout->nest('content','dojo::articles.edit',array(
			'article'=>$article,
			'user'=>$user,
			
		));
	}


	/**
	 * This function it will analyse the new data with the old one and check what it will be updated in the defined article
	 */
	
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


	/**
	 * Function that will show the page for create a new article
	 * @return array $user it will send the user info
	 */
	public function get_new(){
		$user = Auth::user();
		$this->layout->nest('content','dojo::articles.add',array(
    		'user'=>$user,
    	));
	}

	/**
	 * Function that it will handle with post creation and validate all fields of creation
	 * @todo Fix upload bug , since when we dont specify a cover it will try upload something
	 */
	public function post_new(){
        $new_post =  Input::all();
        unset($new_post['csrf_token']);
        unset($new_post['tags']);
        unset($new_post['_continue']);
        unset($new_post['_cancel']);
        $new_post['slug']= Str::slug($new_post['title']);    	
   
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
        }

        //Tag handler
            
	    $tags = Tag::input('tags');
		$tag_ids = array_values( array_map(
			function($tag){ return $tag->id; },
			$tags
		));
        
		dd($new_post);
        # cover upload handler
        if(!empty($new_post['cover'])){

	        $extension = File::extension($new_post['cover']['name']);
	        $directory = path('public').'images/thumbnails/articles/';
	        $filename = sha1(time()).".{$extension}";
	        $upload_sucess = Input::upload('cover', $directory, $filename);
			if($upload_sucess){
				$new_post['cover'] = URL::to('images/thumbnails/articles/'.$filename);

			}

		}
		$new_article = new Article($new_post);
        $new_article->save();
        $new_article->tags()->sync($tag_ids);
    	return Redirect::to('dojo/articles/');
			
	}

	/**
	 * Function that handle with image upload when using refactor editor
	 * @todo fix upload of images
	 * @return json response with link for the image
	 */
	public function post_redactorupload(){
		$rules = array(
			'file' => 'image|max:100000'
		);

		$path = path('base');
		$validation = Validator::make(Input::all(), $rules);
		$file = Input::file('file');
		if($validation->fails()){
			die("teste");
			//return FALSE;
		}else{
			if(Input::upload('file','public/images/articles',$file['name'])){
				return Response::json(array('filelink'=>URL::base() .'/images/articles/' . $file['name']));
			}
			return FALSE;
		}

	}

	/**
	 * Functions that handles with search results and display them
	 * @param  string $keyword keyword for the search in database
	 * @return array $articles array of articles that match with the keyword
	 */
	public function get_results($keyword){
		$articles = Article::get_search($keyword);
		dd($articles);
		return View::make('dojo::articles.results')
			->with('title', 'Results search for $keyword')
			->with('articles', Articles::search($keyword));

	}

	/**
	 * Function that will check if the $keyword is empty or a valid search query
	 */
	public function post_search() {
		$keyword = Input::get('keyword');

		if (empty($keyword)) {
			return Redirect::to_route('dojo::index_article')
				->with('message', 'No keyword entered, please try again')
				->with('title','List of articles');
		}

		return Redirect::to_route('dojo::results_article',"$keyword");
	}



}
/**
 * @Todo
 *
 * Fix search behaviour
 * Fix upload files
 */
