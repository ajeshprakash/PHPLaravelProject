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

Route::get('/', 'WelcomeController@index');
Route::get('/homenew', 'WelcomeController@ajesh');

Route::group(['prefix' => 'admin'], function () {
    Route::get('foo/{name}', function ($name)    {
        // Matches The "/admin/users" URL
		return 'Hello Mr. ' .ucfirst($name);
    });
	Route::get('ajesh/{name}', function ($name)    {
        // Matches The "/admin/users" URL
		return 'Hello Mr. ' .ucfirst($name);
    });
});

Route::get('/foo/{name?}', function ($name = 'John') {
    return 'Hello Mr. ' .ucfirst($name);
})->where('name', '[A-Z a-z 0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
    // //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::post('foos/bar', function () {
   return 'Hello World';
});

Route::get('role',[
   'middleware' => 'Role:editor',
   'uses' => 'TestController@index',
]);

Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
