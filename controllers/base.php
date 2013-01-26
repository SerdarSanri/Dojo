<?php

class Dojo_Base_Controller extends Controller{
   
    public $restful = true;
    public $layout = 'dojo::layouts.main';

    public function __construct(){
        parent::__construct();
        Config::set('auth.driver','dojoauth');

        Asset::container('header')->bundle('dojo');
        Asset::container('header')->add('bootstrap','css/bootstrap.css');
        
        Asset::container('footer')->bundle('dojo');
        Asset::container('footer')->add('jquery','http://code.jquery.com/jquery-latest.min.js');
        Asset::container('footer')->add('jqueryui','http://code.jquery.com/ui/1.10.0/jquery-ui.js');
        Asset::container('footer')->add('main','js/main.js');
        Asset::container('footer')->add('datasort','http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js');
        Asset::container('footer')->add('sorter','http://www.datatables.net/media/blog/bootstrap_2/DT_bootstrap.js');

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
