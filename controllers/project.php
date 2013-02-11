<?php
use Dojo\Models\Project;
class Dojo_Project_Controller extends Controller{
        public $restful = true;
        
        public function get_projects(){
                 $articles = Article::order_by('created_at','desc')->take(5)->get();
                 $projects_list = Project::all();
                 $projects = Project::order_by('created_at','desc')->take(5)->get();
                 $tags = Tag::all();
         $settings = Setting::find(1);
         $error = "ERRO: Não existem projectos!\n";
         if($projects){
         return View::make('project.project_list')
           ->with('projects', $projects)
           ->with('articles',$articles)
           ->with('taglist',$tags)
           ->with('settings',$settings)
           ->with('projects_list',$projects_list);
         }else{
                return View::make('error.not_found')
           ->with('projects', $projects)
           ->with('articles',$articles)
           ->with('taglist',$tags)
           ->with('error',$error)
           ->with('settings',$settings)
                      ->with('projects_list',$projects_list);

         }
        }

        public function get_list(){
                $projects = Project::all();
                return View::make('project.cp_list')
                        ->with('projects',$projects);
        }

        public function get_new_project(){
                $user = Auth::user();
        return View::make('project.new_project')->with('user', $user);
        }


        public function post_new_project(){

                $new_project =  array(
        'title'    => Input::get('project_title'),
        'project_body'     => Input::get('project_body'),
        'slug' => Str::slug(Input::get('project_title')),
        'cover' => Input::file('cover.name'),
        );
        
            $rules = array(
            'title'     => 'required|min:3|max:255',
            'cover'  => 'image',
            );
             
            $validation = Validator::make($new_project, $rules);
            if ( $validation -> fails() )
            {
                 
                return Redirect::to('admin')
                        ->with('user', Auth::user())
                        ->with_errors($validation)
                        ->with_input();
        }else{   
       
                $new_project = new Project($new_project);
                $new_project->save();
                  
                 //    if($new_post['cover']){
                 //         $img = Input::file('cover');
                        //     $directory = path('public').'uploads/thumbnails/projects/';
                        //     Input::upload('cover', $directory, Input::file('cover.name'));
                        // }
                        return Redirect::to('admin/projects/');
                }
                // @todo: Fix upload bug , since when we dont specify a cover it will try upload something

            
        }

        public function get_view_project($id){
                $articles = Article::order_by('created_at','desc')->take(5)->get();
                $projects = Project::order_by('created_at','desc')->take(5)->get();
            $tags = Tag::all();
                $settings = Setting::find(1);
                $project = Project::where('slug','=',$id)->first();
                $error = 'ERRO: Projecto não existe';
                if(!($project)){
                        return View::make('error.not_found')
                                ->with('error',$error)
                                ->with('articles',$articles)
                        ->with('settings',$settings)
                        ->with('taglist',$tags)
                        ->with('projects',$projects);
                }else{
                return View::make('project.view_project')
                                ->with('project', $project)
                                ->with('articles',$articles)
                        ->with('settings',$settings)
                        ->with('taglist',$tags)
                        ->with('projects',$projects);
                }
        }
}