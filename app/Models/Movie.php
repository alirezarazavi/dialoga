<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Movie
 *
 * @mixin \Eloquent
 */
class Movie extends Model {

	/**
	 * Get the movie dialogs.
	 */
	public function dialogs() {
		return $this->hasMany('App\Models\Dialog', 'imdb_id', 'imdb_id');
	}


	/**
	 * get movie by imdb_id instead of id
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'imdb_id';
	}


}