<?php
use Dojo\Models\Setting;
class Dojo_Setting_Controller extends Dojo_Base_Controller{
	public $restful = true;

	public function get_index(){
		$this->layout->nest('content','dojo::settings.index');
	}

	public function post_social(){
		$info = Input::all();
		unset($info['csrf_token']);

		
	}
}