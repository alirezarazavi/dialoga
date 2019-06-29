<?php

namespace App\Http\Controllers;

use App\Models\Dialog;
use App\Models\Point;
use App\Repositories\DialogRepositoryInterface;
use Illuminate\Http\Request;
use Auth;

class DialogController extends Controller
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
     * @param string $sortType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($sortType = 'latest')
    {
//		$dialogs = Dialog::with(array('movie'=>function($query){
//			$query->select('imdb_id','title', 'poster');
//		}))->get();
        $dialogs = $this->dialogRepository->findAll($sortType);
        return view('index')->with(compact(['dialogs']));
    }

    /**
     * Validate and Store a dialog
     * 
     * @param \Illuminate\Http\Request $request
     * @return boolean
     */
    public function store(Request $request) 
    {
		$request->validate([
			'resultDialog'	=>	'required|min:5',
			'resultTitle'	=>	'required',
			'resultPoster'	=>	'required',
			'resultType'	=>	'required',
			'resultYear'	=>	'required',
			'resultImdbid'	=>	'required',
		]);

        // Store dialog
        // Return 'true' if success, 'false' if failed to store dialog
        return $this->dialogRepository->store($request);        
	}

    /**
     * Store dialog point
     *
     * @param $dialogId
     * @return string
     */
    public function point($dialogId) {
        $dialog = Dialog::find($dialogId);
        // Insert Point
        $point = Point::where('dialog_id', $dialogId)->where('user_id', auth()->user()->id)->first();
        if (!$point) {
            // Update dialog point
            $dialog->increment('point_count');
            Point::create([
                'dialog_id' => $dialogId,
                'user_id'   => auth()->user()->id,
            ]);
        } else {
            // decrement point
            $dialog->decrement('point_count');
            Point::where('dialog_id', $dialogId)->where('user_id', auth()->user()->id)->delete();
        }
    }
}
