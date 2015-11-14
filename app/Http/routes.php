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

Route::get('/', function () {
    return view('welcome');
});


/* Admin Routes
---------------------------------------------------------------------- */
Route::get('admin/login', ['uses' => 'Admin\AuthController@login', 'as' => 'admin.login', 'middleware' => 'guest.admin']);
Route::post('admin/login', ['uses' => 'Admin\AuthController@getLogin', 'as' => 'admin.getLogin', 'middleware' => 'guest.admin']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth.admin'], function () {
	Route::get('logout', 'AuthController@logout')->name('admin.logout');
	Route::get('/', 'HomeController@index')->name('admin.home');

	//System Users
	Route::resource('systemuser', 'SystemUserController');
	
});