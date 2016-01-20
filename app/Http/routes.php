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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'api'], function () {
 //    Route::post('login', function (Request $request) {
 //    	dd(Request::all());
	// });

	// Route::post('register', function (Request $request) {
 //    	dd(Request::all());
	// });
	Route::post('login', 'RegisterController@login');
	Route::post('register', 'RegisterController@store');
	Route::get('logout', 'RegisterController@logout');

});






Route::group(['middleware' => ['web']], function () {
    //
});

