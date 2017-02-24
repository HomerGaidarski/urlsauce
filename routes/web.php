<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [
		'as' => '/',
		'uses' => 'UrlController@getIndex'
]);

Route::get('about', [
		'as' => 'about',
		'uses' => 'PagesController@getAbout'
	]);

// store new url NOTE: need to prevent this from being created as a urlcode
Route::post('/store', 'UrlController@store');

// redirect shorturl to actual long url
Route::get('/{urlCode?}','UrlController@redirectToUrl')
    ->where('urlCode', '(.*)');

/* /u will never be used in a generated url because autoincrementing in mysql always starts from one,
	which is why u is skipped (u is the first character (0th element) in the character map used for generating shortened urls)
	I might change the routing in the future for shortened urls so that it is /url/urlcodehere or /u/urlcodehere
*/
Route::get('/user/{profile}', [
		'as' => 'profile',
		'uses' => 'UserController@showProfile'
	]);

Route::get('/u/{profile}', [
		'as' => 'profile',
		'uses' => 'UserController@showProfile'
	]);