<?php

Route::any('/(:bundle)/logout','Dojo::login@logout');
Route::any('/(:bundle)/users',array('as'=>'dojo::index_user','uses'=>'Dojo::user@index'));
Route::any('/(:bundle)/login', array('as'=>'dojo::login','uses'=>'Dojo::login@index'));
Route::get('/(:bundle)/users/edit/(:any)',array('as'=>'dojo::edit_user','uses'=>'Dojo::user@edit'));
Route::get('/(:bundle)/users/view/(:any)',array('as'=>'dojo::view_user','uses'=>'Dojo::user@view'));
Route::put('/(:bundle)/users/edit/update',array('as'=>'dojo::update_user','uses'=>'Dojo::user@update'));
Route::any('/(:bundle)/users/delete/(:any)',array('as'=>'dojo::delete_user','uses'=>'Dojo::user@erase'));



Route::controller(Controller::detect('dojo'));


Route::filter('auth',function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('dojo::login'));
});
Route::filter('csrf', function()
{
    if (Request::forged()) return Response::error('500');
});