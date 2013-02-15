<?php
use Dojo\Models\Project;
class Dojo_Project_Controller extends Dojo_Base_Controller{
    public $restful = true;
    
    public function get_index($type = "index", $id="all",$sorter = "ns"){
        $title = "List of Projects";



        //sorter and searcher for table
        if($type == "index" && $id== "all" && (preg_match("/^(title|created_at|author_id|draft|published)/", $sorter))){
            $projects = Project::order_by($sorter,'asc')->get();
            $count = Project::count();

        }elseif ((preg_match("/^(draft|published)/", $type)) && (preg_match("/^(1|0)/",$id)) && $sorter == "ns") {
            
            $projects = Project::get_query($type,$id);
            $count =Project::get_totals($type,$id);

        }elseif((preg_match("/^(index|draft|published)/", $type)) && (preg_match("/^(1|0)/",$id)) && (preg_match("/^(title|published|author_id|draft|created_at|ns)/", $sorter))){
            $projects = Project::get_order($sorter,$type,$id);
            $count = Project::get_totals($type,$id);
        }else{
            $projects = Project::all(); 
            $count = Project::count();

        }

        $this->layout->nest('content','dojo::projects.index',array(
            'projects'=>$projects,
            'count'=>$count,
        ));
    }   

    /**
     * Update/Delete post from projects table have support for multi choice
     * @return string thats notices that projects were updated/modified
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
                    
                    Project::post_delete($item);
                }
                break;
            
            case 'publish_selected':
                foreach ($data as $item) {
                    
                    Project::post_update('published','1',$item);
                }
                break;

            case 'draft_selected':
                foreach ($data as $item) {
                    
                    Project::post_update('draft','1',$item);
                }
                break;

            default:
                # code...
                break;
        }

        return Redirect::to_route('dojo::index_project')
            ->with('title','List of projects')
            ->with('message','Project(s) Updated');
        
    }

    /**
     * This function it will get the id of project that we want edit and present a page with the old data
     * @param  integer $id id of the project we want to edit
     * @return nothing
     */
    
    public function get_edit($id){
        
        $project = Project::find($id);
        $this->layout->nest('content','dojo::projects.edit',array(
            'project'=>$project,
            'id'=>$id,
            
        ));
    }

    /**
     * This function it will analyse the new data with the old one and check what it will be updated in the defined project
     */
    
    public function post_edit(){
        $id = Input::get('id');
        $olddata = Project::find($id);
        $post_title = Input::get('title');
        $post_body = Input::get('project_body');
        $slug = Str::slug(Input::get('title'));
        $edit_info = array();

        if(strcmp($olddata->title, $post_title) != 0){
            $edit_info["title"] = $post_title;
        }
        if(strcmp($olddata->post_body, $post_body) != 0){
            $edit_info["project_body"] = $post_body;
        }
        if(strcmp($olddata->slug, $slug) != 0){
            $edit_info["slug"] = $slug;
        }

        $rules = array(
            'cover'  => 'image',
            'slug'  => 'unique:projects',
            'title' => 'unique:projects|min:3|max:255',
        );

        $validation = Validator::make($edit_info,$rules);
        if($validation->fails()){
            return Redirect::to_route('dojo::edit_project',$id)
                ->with_errors($validation)
                ->with('user',$user);
        }else{
            Project::update($id,$edit_info);
            return Redirect::to_route('dojo::index_project');
        }
    }

        /**
     * Function that will show the page for create a new project
     * @return array $user it will send the user info
     */
    public function get_new(){
        $user = Auth::user();
        $this->layout->nest('content','dojo::projects.add',array(
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
            'cover'  => 'image',
            'title' => 'required|min:3|max:255|unique:projects',
            'slug' => 'required',
        );
        

        $validation = Validator::make($new_post, $rules);
        if ( $validation -> fails() )
        {
            
            return Redirect::to('dojo/projects')
                    ->with('user', Auth::user())
                    ->with_errors($validation)
                    ->with_input();
        }
        
        # cover upload handler
        if(!empty($new_post['cover']['name'])){

            $extension = File::extension($new_post['cover']['name']);
            $directory = path('public').'images/thumbnails/projects/';
            $filename = sha1(time()).".{$extension}";
            $upload_sucess = Input::upload('cover', $directory, $filename);
            if($upload_sucess){
                $new_post['cover'] = URL::to('images/thumbnails/projects/'.$filename);

            }

        }else{
            unset($new_post['cover']);
        }
        $new_project = new Project($new_post);
        $new_project->save();
        return Redirect::to('dojo/projects/');
            
    }

    /**
     * Function that handle with image upload when using refactor editor
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
            if(Input::upload('file','public/images/projects',$file['name'])){
                return Response::json(array('filelink'=>URL::base() .'/images/projects/' . $file['name']));
            }
            return FALSE;
        }

    }



    
}