<?php

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;
class Project extends Eloquent{
        public $restful = true;
        
    public function author(){
        return $this->belongs_to('Dojo\Models\User','author_id');
    }

    public static function get_order($field,$value,$order){
        $projects = Project::order_by($order,'asc')->where($field,'=',$value)->get();
        return $projects;

    }

    public static function get_query($field,$value){
        $projects = Project::where($field,'=',$value)->get();
        return $projects;
    }

    public static function get_totals($field,$value){
        $total = Project::where($field,'=',$value)->count();
        return $total ;
    }

    public static function post_update($field,$value,$id){

        $project = Project::find($id);
        $project->$field = $value;
        $project->save();

    }

    public static function post_delete($id){
        $project = Project::with('author')->find($id);
        $project->delete();
    }

    public static function get_search($keyword){
        $project = static::where('title','LIKE', '%'.$keyword.'%')->paginate(5);
        return $project;
    }
}