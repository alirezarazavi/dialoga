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
        // Store dialog
    	$dialog = new Dialog;
        $dialog->text       = $request->dialog_text;
        $dialog->user_id    = Auth::user()->id;
        $dialog->imdb_id    = $request->movie_imdb_id;
        
        if ($dialog->save()) {
            // store movie, if not exist
            $movie_exist = Movie::where('imdb_id', '=', $request->movie_imdb_id)->first();
            if (!$movie_exist) {
                $movie = new Movie;
                $movie->imdb_id = $request->movie_imdb_id;
                $movie->title   = $request->movie_title;
                $movie->year    = $request->movie_year;
                $movie->type    = $request->movie_type;
                $movie->poster  = $request->movie_poster;
                $movie->save();
            }

            return redirect()->route('home')->with('message-success', 'دیالوگ ذخیره شد');
        } else {
            return redirect()->route('home')->with('message-error', 'مشکلی پیش آمد');
        }

	}



}
