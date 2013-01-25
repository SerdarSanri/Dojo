<?php
class Dojo_Home_Controller extends Dojo_Base_Controller{
    public function get_index(){
        $this->layout->title = 'Dashboard';
    	$this->layout->nest('content', 'dojo::dashboard.index');
    }
    
    
}
