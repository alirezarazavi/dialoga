<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class MovieRepository implements MovieRepositoryInterface {

	/**
	 * Return popular movies with most dialogs
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getPopularMovies() {
		return DB::table('movies')
					->join('dialogs', 'movies.imdb_id', '=', 'dialogs.imdb_id')
					->select(array('movies.*', DB::raw('count(movies.imdb_id) as total')))
					->groupBy('movies.id')
					->take(config('constants.MOVIE_POPULAR_NUMBER'))
					->get();
	}

}