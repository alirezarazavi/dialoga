<?php

namespace App\Http\Controllers;

use App\Repositories\DialogRepositoryInterface;
use Illuminate\Http\Request;
use aharen\OMDbAPI;
use Image;

class MovieController extends Controller {

	protected $omdb;
	protected $dialogRepository;

	public function __construct(DialogRepositoryInterface $dialogRepository) {
		$this->omdb = new OMDbAPI('4b227fb4', false, true);
		$this->dialogRepository = $dialogRepository;
	}

	public function show($imdbId) {
		$movie = $this->omdb->fetch('i', $imdbId);
		$img = Image::make($movie['data']['Poster']);
		$imgColor = $img->pickColor(100, 100, 'hex');

		return view('single')->with([
			'dialogs'           =>  $this->dialogRepository->find($imdbId),
			'movie' 	        => 	$movie,
			'color'		        =>	$imgColor,
		]);
	}

	public function search(Request $request) {
		if ($request->ajax()) {
			return Response($this->omdb->search($request->movie));
		}
	}

}
