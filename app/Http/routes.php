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

Route::get('/', [
		'as' => '/',
		'uses' => 'PagesController@getIndex'
]);

Route::get('about', [
		'as' => 'about',
		'uses' => 'PagesController@getAbout'
	]);

// store new url
Route::post('/store', 'UrlController@store');


// redirect shorturl to actual long url
Route::get('/{urlCode}',[
		'as' => 'urlCode',
		'uses' => 'UrlController@redirectToUrl'
]);

/* /K will never be used in a generated url because autoincrementing in mysql always starts from one,
	which is why K is skipped (K is the first character (0th element) in the character map used for generating shortened urls)
	I might change the routing in the future for shortened urls so that it is /url/urlcodehere or /u/urlcodehere
*/
Route::get('/K/profile', [
		'as' => 'profile',
		'uses' => 'UserController@showProfile'
	]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
