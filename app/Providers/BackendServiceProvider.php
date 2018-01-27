<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

	public function register() {

		$this->app->bind(
			'App\Repositories\UserRepositoryInterface',
			'App\Repositories\UserRepository'
		);

		$this->app->bind(
			'App\Repositories\MovieRepositoryInterface',
			'App\Repositories\MovieRepository'
		);

		$this->app->bind(
			'App\Repositories\DialogRepositoryInterface',
			'App\Repositories\DialogRepository'
		);


	}

}