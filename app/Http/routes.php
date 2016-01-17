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
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|


Route::group(['middleware' => ['web']], function () {
    //
});
*/

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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {




Route::get('test', function () {
    return view('welcome');
});



// Here starts the real Router

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/dash', ['uses' => 'DashboardController@index']);


});  /* end of web group without auth*/


Route::group(['middleware' => ['auth','web']], function () {
	
// Home Routes for Homepage
Route::get('/dashboard', ['uses' => 'DashboardController@index']);
Route::get('/home', ['uses' => 'DashboardController@index']);
// Home Routes for Homepage
Route::get('/cc', ['uses' => 'DashboardController@index']);

// Benutzerverwaltung Routes
Route::get('/useradmin/groups', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@index'
]);
Route::get('/useradmin/group/create', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@create'
]);

Route::get('/useradmin/groups/ajax', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@ajax'
]);

Route::post('/useradmin/groups/axsave', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@axsave'
]);
Route::get('/useradmin/groups/axsave', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@axsave'
]);

Route::get('/useradmin/groups/axmanager', [
    'middleware' => 'auth',
    'uses' => 'Useradmin\GroupController@axmanager'
]);


});  /* end of web group */
