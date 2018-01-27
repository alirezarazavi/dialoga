<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface {

	/**
	 * Return all user dialogs
	 *
	 * @param $username
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function getUserDialogs($username) {
		return DB::table('dialogs')
			->join('movies', 'dialogs.imdb_id', '=', 'movies.imdb_id')
			->join('users', 'dialogs.user_id', '=', 'users.id')
			->orderBy('dialogs.id', 'desc')
			->select('dialogs.*', 'movies.imdb_id', 'movies.title', 'movies.year', 'movies.type', 'movies.poster', 'users.username')
			->where('username', '=', $username)
			->paginate(config('constants.PAGE_NUMBER'));
	}


	/**
	 * Return active users by number of dialogs they submit
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getActiveUsers() {
		return DB::table('dialogs')
					->join('users', 'dialogs.user_id', '=', 'users.id')
					->select(array('users.username', 'users.avatar', DB::raw('count(dialogs.user_id) as total')))
					->groupBy('users.id')
					->take(config('constants.ACTIVE_USER_NUMBER'))
					->get();
	}


}