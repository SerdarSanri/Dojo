<?php

Route::any('/(:bundle)/logout','Dojo::login@logout');
Route::any('/(:bundle)/login', array('as'=>'dojo::login','uses'=>'Dojo::login@index'));
Route::any('/(:bundle)/users',array('as'=>'dojo::index_user','uses'=>'Dojo::user@index'));
Route::get('/(:bundle)/users/edit/(:any)',array('as'=>'dojo::edit_user','uses'=>'Dojo::user@edit'));
Route::get('/(:bundle)/users/view/(:any)',array('as'=>'dojo::view_user','uses'=>'Dojo::user@view'));
Route::put('/(:bundle)/users/edit/update',array('as'=>'dojo::update_user','uses'=>'Dojo::user@update'));
Route::any('/(:bundle)/users/delete/(:any)',array('as'=>'dojo::delete_user','uses'=>'Dojo::user@erase'));

//articles routes
Route::any('/(:bundle)/articles',array('as'=>'dojo::index_article','uses'=>'Dojo::article@index'));
Route::get('/(:bundle)/articles/edit/(:any)',array('as'=>'dojo::edit_article','uses'=>'Dojo::article@edit'));
Route::get('/(:bundle)/articles/view/(:any)',array('as'=>'dojo::view_article','uses'=>'Dojo::article@view'));
Route::put('/(:bundle)/articles/edit/update',array('as'=>'dojo::update_article','uses'=>'Dojo::article@update'));
Route::any('/(:bundle)/articles/delete/(:any)',array('as'=>'dojo::delete_article','uses'=>'Dojo::article@erase'));
Route::any('/(:bundle)/articles/new',array('as'=>'dojo::new_article','uses'=>'Dojo::article@new'));

Route::controller(Controller::detect('dojo'));


Route::filter('auth',function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('dojo::login'));
});
Route::filter('csrf', function()
{
    if (Request::forged()) return Response::error('500');
});