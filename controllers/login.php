<?php

class Dojo_Login_Controller extends Controller{
    public $restful = true;
    public function __construct(){
        parent::__construct();
        Config::set('auth.driver','dojoauth');
        Asset::container('header')->bundle('dojo');
        Asset::container('header')->add('bootstrap','css/bootstrap.min.css');

    }

    public function get_index(){
        return View::make('dojo::login.index');
    }

    public function post_index(){
        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if(Auth::attempt($creds)){
            return Redirect::to(URL::to_action('dojo::home@index'));
        }else{
            return Redirect::back()->with('error',true);
        }
    }

    public function get_logout(){
        Auth::logout();
        return Redirect::to(URL::to_action('dojo::home@index'));
    } 
}
