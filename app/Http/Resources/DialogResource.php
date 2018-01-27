<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DialogResource extends Resource
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
			'imdb_id'		=>	$this->imdb_id,
			'movie_title'	=>	$this->title,
			'username'		=>	$this->username,
			'text'			=>	$this->text,
		];
    }
}
