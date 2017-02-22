<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@home');

Route::get('about', 'PagesController@aboutUs');
Route::get('messages', 'MessagesController@search');
Route::get('messages/{message}', 'MessagesController@show');
Route::post('messages/create', 'MessagesController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('{username}', 'UsersController@show');

Route::put('{username}', 'UsersController@follow')->middleware('auth');
Route::delete('{username}', 'UsersController@unfollow')->middleware('auth');

Route::group(['prefix' => 'auth/{provider}'], function(){
    Route::get('redirect', 'SocialAuthController@redirect');
    Route::get('callback', 'SocialAuthController@callback');
    Route::post('register', 'SocialAuthController@register');
});

Route::post('{username}/dms', 'UsersController@sendMessage');
Route::get('{username}/dms', 'UsersController@privateMessages');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/api/notifications', 'ApiController@notifications');
    Route::post('/messages/{message}/like', 'ApiController@like');
    Route::post('/messages/{message}/repost', 'ApiController@repost');
});
