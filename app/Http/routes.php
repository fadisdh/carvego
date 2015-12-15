<?php

Route::get('/', function () {
    return "hey";
});


/* Admin Routes
---------------------------------------------------------------------- */
Route::get('admin/login', ['uses' => 'Admin\AuthController@login', 'as' => 'admin.login', 'middleware' => 'guest.admin']);
Route::post('admin/login', ['uses' => 'Admin\AuthController@getLogin', 'as' => 'admin.getLogin', 'middleware' => 'guest.admin']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth.admin'], function () {
	Route::get('logout', 'AuthController@logout')->name('admin.logout');
	Route::get('/', 'HomeController@index')->name('admin.home');

	Route::resource('systemuser', 'SystemUserController');
	Route::resource('car', 'CarController');
	Route::resource('city', 'CityController');
	Route::resource('comment', 'CommentController');
	Route::resource('featured', 'FeaturedController');
	Route::resource('option', 'OptionController');
	Route::resource('page', 'PageController');
	Route::resource('role', 'RoleController');
	Route::resource('user', 'UserController');

	Route::get('/autocomplete/systemuser', 'AutoCompleteController@systemUser')->name('admin.autocomplete.systemuser');
	Route::get('/autocomplete/user', 'AutoCompleteController@user')->name('admin.autocomplete.user');
	Route::get('/autocomplete/role', 'AutoCompleteController@role')->name('admin.autocomplete.role');
});











