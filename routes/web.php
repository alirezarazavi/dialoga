<?php

// Home page
Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@store');
// Movie, Search (omdb api) and Single
Route::get('/movie_search', 'MovieController@search')->name('movie_search');
Route::get('/title/{imdbId}/', 'MovieController@show')->name('single');
// User Login and Registration
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
// User profile
Route::get('settings', 'UserController@settings')->name('settings');
Route::post('settings', 'UserController@update')->name('settings_update');
Route::get('{username}', 'UserController@profile')->name('profile');

// Vuejs
Route::get('/vue/skills', function() {
	return ['php', 'mysql', 'laravel', 'vuejs'];
});
Route::get('/vue/view', function() {
	return view('vue');
});

