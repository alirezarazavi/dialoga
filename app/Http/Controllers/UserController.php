<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Image;

class UserController extends Controller
{
    protected $userRepository;

	/**
	 * Create a new controller instance.
	 *
	 * @param UserRepositoryInterface $userRepository
	 */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
		$this->userRepository = $userRepository;
    }


    public function profile($username) {
//    	$user = User::with(array('dialogs' => function ($query) {
//    		$query->select('id', 'user_id', 'text');
//		}))->get();
//    	dd($user);
        return view('profile')->with([
            'dialogs'   =>  $this->userRepository->getUserDialogs($username),
        ]);
    }


    public function settings() {
        return view('settings');
    }


    public function update(Request $request) {
        $user = User::find(auth()->user()->id);
        if ($request->has('update-password')):
            
            $request->validate([
                'old_password'          =>  'required',
                'new_password'          =>  'required|min:6',
                'new_password_confirm'  =>  'required|same:new_password'
            ]);
            
            $data = $request->all();

            if (!Hash::check($data['old_password'], $user->password)) {
                return redirect()->route('profile')->with('message-error', 'رمز وارد شده با رمز فعلی شما همخوانی ندارد');
            } else {
                $user->password = Hash::make($data['new_password']);
                if ($user->save()) {
                    return back()->with('message-success', 'رمزعبور با موفقیت تغییر یافت');
                } else {
                    return redirect()->route('profile')->with('message-error', 'مشکلی پیش آمد. رمزعبور تغییر نکرد');
                }
            }

        elseif ($request->has('user-image')):

            if ($request->hasFile('user-image')) {
                if ($user->avatar && $user->avatar != 'default.png') {
                    // delete previously uploaded avatar image
                    $image_path = public_path('/uploads/avatars/'.$user->avatar);
                    if (file_exists($image_path)) {
                        // delete image
                        unlink($image_path);
                    }
                }
                $request->validate([
                    'user-image'    =>  'required|image|mimes:jpeg,png,jpg|max:500'
                ]);
                $avatar = $request->file('user-image');
                $filename = time().'.'.$avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
                $user->avatar = $filename;
                $user->save();
                return back()->with('message-success', 'تصویر پروفایل تغییر کرد');
            }

        endif;

    }




}
