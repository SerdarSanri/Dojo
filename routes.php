<?php

Route::any('/(:bundle)/logout','Dojo::login@logout');
Route::any('/(:bundle)/login', array('as'=>'dojo::login','uses'=>'Dojo::login@index'));
Route::any('/(:bundle)/users',array('as'=>'dojo::index_user','uses'=>'Dojo::user@index'));
Route::get('/(:bundle)/users/edit/(:any)',array('as'=>'dojo::edit_user','uses'=>'Dojo::user@edit'));
Route::get('/(:bundle)/users/view/(:any)',array('as'=>'dojo::view_user','uses'=>'Dojo::user@view'));
Route::put('/(:bundle)/users/edit/update',array('as'=>'dojo::update_user','uses'=>'Dojo::user@update'));
Route::any('/(:bundle)/users/delete/(:any)',array('as'=>'dojo::delete_user','uses'=>'Dojo::user@erase'));

//articles routes
Route::any('/(:bundle)/articles/new/redactor',array('as'=>'dojo::new_image','uses'=>'Dojo::article@redactorupload'));
Route::get('/(:bundle)/articles/edit/(:any)',array('as'=>'dojo::edit_article','uses'=>'Dojo::article@edit'));
Route::post('/(:bundle)/articles/edit/update',array('as'=>'dojo::updated_article','uses'=>'Dojo::article@edit'));
Route::put('/(:bundle)/articles/quick_edit/update',array('as'=>'dojo::update_mass','uses'=>'Dojo::article@update'));
Route::any('/(:bundle)/articles/delete/(:any)',array('as'=>'dojo::delete_article','uses'=>'Dojo::article@erase'));
Route::any('/(:bundle)/articles/new',array('as'=>'dojo::new_article','uses'=>'Dojo::article@new'));
Route::any('/(:bundle)/articles/(:any?)/(:any?)/(:any?)',array('as'=>'dojo::index_article','uses'=>'Dojo::article@index'));
Route::post('/(:bundle)/articles/search',array('uses'=>'Dojo::article@search'));
Route::get('/(:bundle)/articles/results/(:all)',array('as'=>'dojo::results_article','uses'=>'Dojo::article@results'));

//projects routes
Route::any('/(:bundle)/projects/new/redactor',array('as'=>'dojo::new_image_project','uses'=>'Dojo::project@redactorupload'));
Route::get('/(:bundle)/projects/edit/(:any)',array('as'=>'dojo::edit_project','uses'=>'Dojo::project@edit'));
Route::post('/(:bundle)/projects/edit/update',array('as'=>'dojo::update_project','uses'=>'Dojo::project@edit'));
Route::any('/(:bundle)/projects/delete/(:any)',array('as'=>'dojo::delete_project','uses'=>'Dojo::project@erase'));
Route::any('/(:bundle)/projects/new',array('as'=>'dojo::new_project','uses'=>'Dojo::project@new'));
Route::any('/(:bundle)/projects/(:any?)/(:any?)/(:any?)',array('as'=>'dojo::index_project','uses'=>'Dojo::project@index'));
Route::post('/(:bundle)/projects/search',array('uses'=>'Dojo::project@search'));
Route::get('/(:bundle)/projects/results/(:all)',array('as'=>'dojo::results_project','uses'=>'Dojo::project@results'));
Route::put('/(:bundle)/projects/edit/update',array('as'=>'dojo::update_project','uses'=>'Dojo::project@update'));



Route::controller(Controller::detect('dojo'));


Route::filter('auth',function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('dojo::login'));
});
Route::filter('csrf', function()
{
    if (Request::forged()) return Response::error('500');
});