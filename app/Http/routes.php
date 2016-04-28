<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

   // Route::auth();
	Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
 	Route::get('password/reset', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');

});

Route::group(['middleware' => ['web', 'auth']], function () {

	Route::get('/', 'BugsController@index');
	Route::resource('bugs','BugsController');
    Route::post('/bugs/{bugs}/comment/', 'BugsController@storecomment');
    Route::get('/bugs/{bugs}/sendupdate/', 'BugsController@sendEmailUpdate');
	Route::resource('projects','ProjectsController');
	Route::resource('users','UserController');

});