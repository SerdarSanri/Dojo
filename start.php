<?php

Autoloader::map(array(
	'Dojo_Base_Controller' => Bundle::path('dojo').'controllers/base.php',
));

Autoloader::namespaces(array(
	'Dojo\Models' => Bundle::path('dojo').'models',
	'Dojo\Libraries'=>Bundle::path('dojo').'libraries',
));

Auth::extend('dojoauth',function(){
    return new Dojo\Libraries\DojoAuth;
});
