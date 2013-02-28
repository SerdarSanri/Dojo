<?php

namespace Dojo\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;
class Setting extends Eloquent{
    public static $table = 'settings';


    public static function get_query($value,$name){
    	$row = Setting::where('name','=','$name')->get();
    	return Setting::update($row,$value);
    }

    public static function update($row,$value){
    	dd($row);
    	$update->$row = $value;
    	$update->save();
    }
	        

}