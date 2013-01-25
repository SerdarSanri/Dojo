<?php

Route::controller(array(
    'dojo::home',
    'dojo::login',
));

Route::filter('auth',function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('dojo::login'));
});
