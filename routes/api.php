<?php

// Route will be /api/v1/...
Route::prefix('v1')->group(function() {

	Route::apiResources([
		'users' 	=> 	'api\ApiUserController',
		'dialogs'	=>	'api\ApiDialogController',
		'movies'	=>	'api\ApiMovieController'
	]);

	Route::post('register', 'api\ApiAuthController@register');
	Route::post('login', 'api\ApiAuthController@login');
    Route::post('logout', 'api\ApiAuthController@logout');
    Route::post('user', 'api\ApiAuthController@user');
});

