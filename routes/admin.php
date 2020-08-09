<?php

Route::group(['prefix' => 'admin'], function() {

	Route::get('login', 'admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'admin\LoginController@logout')->name('admin.logout');

	Route::get('/', function(){
		return view('admin.dashboard.index');
	});


});