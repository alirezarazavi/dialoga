<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DialogRepository implements DialogRepositoryInterface {

	/**
	 * Return all dialogs with their movie information
	 * 
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function findAll() {
        return DB::table('dialogs')
					->join('movies', 'dialogs.imdb_id', '=', 'movies.imdb_id')
					->join('users', 'dialogs.user_id', '=', 'users.id')
					->orderBy('dialogs.id', 'desc')
					->select('dialogs.*', 'movies.imdb_id', 'movies.title', 'movies.year', 'movies.type', 'movies.poster', 'users.username', 'users.avatar')
					->paginate(config('constants.PAGE_NUMBER'));
	}

	/**
	 * Return all dialogs for a movie
	 *
	 * @param $imdbId
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function find($imdbId) {
		return DB::table('dialogs')
					->join('movies', 'dialogs.imdb_id', '=', 'movies.imdb_id')
					->join('users', 'dialogs.user_id', '=', 'users.id')
					->orderBy('dialogs.id', 'desc')
					->select('dialogs.*', 'movies.imdb_id', 'movies.title', 'movies.year', 'movies.type', 'movies.poster', 'users.username')
					->where('dialogs.imdb_id', '=', $imdbId)
					->paginate(config('constants.PAGE_NUMBER'));
	}


}