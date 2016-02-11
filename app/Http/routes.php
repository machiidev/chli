<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Basisroutes - Homepage, Login

Route::group(['middleware' => 'web'], function () {
	
	// All Auth Routes for Login, etc
    Route::auth();

	// Homepage Route
    Route::get('/home', 'HomeController@index');
	Route::get('/', function()
    {
        return View::make('welcome');
    });

Route::get('/test', function()
    {
        return View::make('test');
    });

	// Benutzerverwaltung Routes
	Route::get ('/useradmin/groups', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@index']);
		Route::get ('/useradmin/users', ['middleware' => 'auth', 'uses' => 'Useradmin\UserController@index']);		
	Route::get ('/useradmin/group/create', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@create']);
	Route::post('/useradmin/groups/axsave', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@axsave']);
	Route::get ('/useradmin/groups/axsave', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@axsave']);
	Route::get ('/useradmin/groups/axmanager', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@axmanager']);
	Route::get ('/useradmin/groups/ajax', ['middleware' => 'auth', 'uses' => 'Useradmin\GroupController@ajax']);
	Route::get ('/useradmin/users/ajax', ['middleware' => 'auth', 'uses' => 'Useradmin\UserController@ajax']);
	Route::get ('/useradmin/users/axsave', ['middleware' => 'auth', 'uses' => 'Useradmin\UserController@axsave']);
	Route::post('/useradmin/users/axsave', ['middleware' => 'auth', 'uses' => 'Useradmin\UserController@axsave']);

}); // EO  Middleware Web