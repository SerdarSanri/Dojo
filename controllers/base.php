<?php

class Dojo_Base_Controller extends Controller{
   
    public $restful = true;
    public $layout = 'dojo::layouts.main';

    public function __construct(){
        parent::__construct();
        Config::set('auth.driver','dojoauth');

        Asset::container('header')->bundle('dojo');
        Asset::container('header')->add('bootstrap','css/bootstrap.css');
        Asset::container('header')->add('boostrapresponsive','css/bootstrap-responsive.css');
        Asset::container('header')->add('changelists','css/changelists.css');
        Asset::container('header')->add('commons','css/commons.css');
        Asset::container('header')->add('redactor','css/redactor.css');
        
        Asset::container('footer')->bundle('dojo');
        Asset::container('footer')->add('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
        Asset::container('footer')->add('jqueryui','http://code.jquery.com/ui/1.10.0/jquery-ui.js');
        Asset::container('footer')->add('bootstrap','js/bootstrap.min.js');
        Asset::container('footer')->add('redactorjs','js/redactor.min.js');

        $this->filter('before','auth');
        $this->filter('before', 'csrf')->on('post,put');
    }

    /**
     * Catch-all method for resquest that cant be matched
     *
     * @param string $method
     * @param array $parameters
     * @return Response
     */

    public function __call($method,$parameters){
        return Response::error('404');
    }
}
