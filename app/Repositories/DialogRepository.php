<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Dialog;

class DialogRepository implements DialogRepositoryInterface {

    /**
     * Return all dialogs with their movie information
     *
     * @param $sortType
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
	public function findAll($sortType) 
	{
        if ($sortType === 'popular') {
	        $order = 'dialogs.point_count';
        } else {
            $order = 'dialogs.id';
        }
        return DB::table('dialogs')
					->join('movies', 'dialogs.imdb_id', '=', 'movies.imdb_id')
					->join('users', 'dialogs.user_id', '=', 'users.id')
//					->join('points', 'users.id', '=', 'points.user_id')
					->orderBy($order, 'desc')
					->select('dialogs.*', 'movies.imdb_id', 'movies.title', 'movies.year', 'movies.type', 'movies.poster', 'users.username', 'users.avatar')
					->paginate(config('constants.PAGE_NUMBER'));
	}

	/**
	 * Return all dialogs for a movie
	 *
	 * @param $imdbId
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function find($imdbId) 
	{
		return DB::table('dialogs')
					->join('movies', 'dialogs.imdb_id', '=', 'movies.imdb_id')
					->join('users', 'dialogs.user_id', '=', 'users.id')
					->orderBy('dialogs.id', 'desc')
					->select('dialogs.*', 'movies.imdb_id', 'movies.title', 'movies.year', 'movies.type', 'movies.poster', 'users.username')
					->where('dialogs.imdb_id', '=', $imdbId)
					->paginate(config('constants.PAGE_NUMBER'));
	}

	/**
	 * Store new dialog
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @return boolean
	 */
	public function store(Request $request)
	{
		$dialog = new Dialog;
        $dialog->text       = $request->get('resultDialog');
        $dialog->user_id    = auth()->user()->id;
        $dialog->imdb_id    = $request->get('resultImdbid');
        $dialog->point_count= 0;

        if ($dialog->save()) {
            // store movie, if not exist
            $movie_exist = Movie::where('imdb_id', '=', $request->get('resultImdbid'))->first();
            if (!$movie_exist) {
                $movie = new Movie;
                $movie->imdb_id = $request->get('resultImdbid');
                $movie->title   = $request->get('resultTitle');
                $movie->year    = $request->get('resultYear');
                $movie->type    = $request->get('resultType');
                $movie->poster  = $request->get('resultPoster');
                $movie->save();
            }

            return 'true';
        } else {
            return 'false';
        }
	}
}