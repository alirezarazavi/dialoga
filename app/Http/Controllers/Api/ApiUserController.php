<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class ApiUserController extends Controller
{

	public function index() {
		return UserResource::collection(User::all());
	}

	public function show(User $user) {
		return new UserResource($user);
	}


	public function dialogs() {
		return 'dialogs';
	}

}