<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['login', 'register']]);
	}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
		]);

		if($validator->fails()){
			return response()->json($validator->errors()->toJson(), 400);
		}

		$user = User::create([
			'username' => $request->get('username'),
			'email' => $request->get('email'),
			'password' => bcrypt($request->get('password')),
		]);

		$token = JWTAuth::fromUser($user);

        return response([
            'status' => 'success',
            'data' => $user,
            'token' => $token
        ], 201);
    }

	/**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['username', 'password']);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 401);
            } else {
                return response([
                    'status' => 'success',
                    'token' => $token
                ], 200);
            }
        } catch(JWTException $e) {
            return response([
                'status' => 'error',
                'error' => 'could_not_create_token',
                'msg' => 'Could not create token.'
            ], 500);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        $user = User::find(JWTAuth::user()->id);
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        // $this->validate($request, ['token' => 'required']);
        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
                'status' => 'success',
                'msg' => 'You have successfully logged out.'
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'status' => 'error',
                'msg' => 'Failed to logout, please try again.'
            ]);
        }
    }

}