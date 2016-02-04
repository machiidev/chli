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
	
    Route::auth();

    Route::get('/home', 'HomeController@index');
	Route::get('/', function()
    {
        return View::make('welcome');
    });



	// Benutzerverwaltung Routes
	Route::get('/useradmin/groups', [
	    'middleware' => 'auth',
	    'uses' => 'Useradmin\GroupController@index'
	]);
	
	Route::get('/useradmin/users', [
	    'middleware' => 'auth',
	    'uses' => 'Useradmin\UserController@index'
	]);	
	
	Route::get('/useradmin/group/create', [
	    'middleware' => 'auth',
	    'uses' => 'Useradmin\GroupController@create'
	]);

	Route::get('/useradmin/groups/ajax', [

	    'uses' => 'Useradmin\GroupController@ajax'
	]);

	Route::get('/useradmin/users/ajax', [

	    'uses' => 'Useradmin\UserController@ajax'
	]);


	Route::post('/useradmin/groups/axsave', [

	    'uses' => 'Useradmin\GroupController@axsave'
	]);
	Route::get('/useradmin/groups/axsave', [

	    'uses' => 'Useradmin\GroupController@axsave'
	]);

	Route::get('/useradmin/groups/axmanager', [

	    'uses' => 'Useradmin\GroupController@axmanager'
	]);

	Route::get('/useradmin/users/axsave', [

	    'uses' => 'Useradmin\UserController@axsave'
	]);

	Route::post('/useradmin/users/axsave', [

	    'uses' => 'Useradmin\UserController@axsave'
	]);

}); // EO  Middleware Web