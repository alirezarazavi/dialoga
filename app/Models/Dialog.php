<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dialog
 *
 * @mixin \Eloquent
 */
class Dialog extends Model {

	/**
	 * Get the movie that owns the dialog.
	 */
//	public function movie() {
//		return $this->belongsTo(Movie::class, 'imdb_id', 'imdb_id')->select(['id', 'title', 'poster', 'imdb_id']);
//	}

	public function user() {
		return $this->hasOne('App\Models\User');
	}

}