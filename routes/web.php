<?php

// Home page
Route::get('/', 'DialogController@index')->name('home');
Route::get('/sort/{sortType}', 'DialogController@index')->name('home.sort.popular');
Route::post('/', 'DialogController@store');
// Movie, Search (omdb api) and Single
Route::get('/movie_search', 'MovieController@search')->name('movie_search');
Route::get('/title/{imdbId}/', 'MovieController@show')->name('single');
// Movie Points
Route::post('/point/{dialogId}', 'DialogController@point');
// User Login and Registration
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
// User profile
Route::get('settings', 'UserController@settings')->name('settings');
Route::post('settings', 'UserController@update')->name('settings_update');
Route::get('{username}', 'UserController@profile')->name('profile');
Route::get('{username}/likes', 'UserController@likes')->name('user.likes');

