<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;

class ApiMovieController extends Controller
{

	/**
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index() {
		return MovieResource::collection(Movie::all());
	}

	/**
	 * @param Movie $movie
	 * @return MovieResource
	 */
	public function show(Movie $movie) {
		return new MovieResource($movie);
	}




}