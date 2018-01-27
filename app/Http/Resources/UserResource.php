<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return Parent::toArray($request);
		return [
			'username'	=>	$this->username,
			'email'		=>	$this->email,
			'avatar'	=>	$this->avatar,
			'dialogs'	=> 	$this->dialogs
		];
    }
}
