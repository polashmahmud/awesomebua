<?php

function eb2bn($str){
	$en = [1,2,3,4,5,6,7,8,9,0];
	$bn = ['১','২','৩','৪','৫','৬','৭','৮','৯','০'];
	return str_replace($en,$bn,$str);
}


Route::group(['middleware' => 'web'], function () {

	Route::get('/', 'HomeController@index');

    // Authentication routes...
	Route::get('login', 'AuthController@showLoginForm');
	Route::post('login', 'AuthController@login');
	Route::get('logout', 'AuthController@logout');

	// Registration routes...
	Route::get('register', 'AuthController@showRegistrationForm');
	Route::post('register', 'AuthController@register');
	Route::get('userlist', 'AuthController@userlist');
	Route::PATCH('profile/{id}', 'AuthController@profile');
	Route::post('password', 'AuthController@password');
	Route::get('userlist/{id}/edit', 'AuthController@useredit');

	//Password Reset routes....
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::resource('booking', 'BookingController');
    Route::resource('account', 'AccountController');
    Route::get('admin', 'AdminController@index');
    Route::get('admin/{id}', 'AdminController@active');
    Route::get('admin/password/{id}', 'AdminController@password');
    Route::get('admin/admin/{id}', 'AdminController@admin');
    Route::post('item', 'AccountController@itemstore');
    Route::get('bookingsummary', 'BookingsummaryController@index');
    Route::get('accountsummary', 'AccountsummaryController@index');
    Route::get('shop', 'ShopController@index');
	Route::post('shop', 'ShopController@store');
	Route::get('allshop', 'ShopController@allshop');
	Route::post('summary', 'SummaryController@index');
	Route::get('balance/{id}/{balance}/{month}/{year}', 'SummaryController@balance');
	Route::get('useraccounts', 'UseraccountsController@index');
	Route::get('useraccounts/{id}/edit', 'UseraccountsController@edit');
	Route::PATCH('useraccounts/{id}', 'UseraccountsController@update');
	Route::post('monthalyreport', 'MonthalyreportController@index');

});
