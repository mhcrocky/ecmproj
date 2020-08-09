<?php

Route::group(['prefix' => 'admin'], function() {

	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

	Route::get('/', function(){
		return view('admin.dashboard.index');
	});


});