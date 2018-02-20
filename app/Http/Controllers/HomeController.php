<?php

namespace App\Http\Controllers;

use App\Models\Dialog;
use App\Models\Movie;
use App\Repositories\DialogRepositoryInterface;
use Debugbar;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    protected $dialogRepository;

	/**
	 * Create a new controller instance.
	 *
	 * @param DialogRepositoryInterface $dialogRepository
	 */
    public function __construct(DialogRepositoryInterface $dialogRepository)
    {
        $this->middleware('auth');
        $this->dialogRepository = $dialogRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
//		$dialogs = Dialog::with(array('movie'=>function($query){
//			$query->select('imdb_id','title', 'poster');
//		}))->get();
        return view('index')->with([
            'dialogs'   =>  $this->dialogRepository->findAll(),
        ]);
    }


	//@TODO store operation goes to repository
    public function store(Request $request) {

		$request->validate([
			'resultDialog'	=>	'required|min:5',
			'resultTitle'	=>	'required',
			'resultPoster'	=>	'required',
			'resultType'	=>	'required',
			'resultYear'	=>	'required',
			'resultImdbid'	=>	'required',
		]);

        // Store dialog
    	$dialog = new Dialog;
        $dialog->text       = $request->get('resultDialog');
        $dialog->user_id    = auth()->user()->id;
        $dialog->imdb_id    = $request->get('resultImdbid');

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
