<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MovieResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		return [
//			'imdb_id'		=>	$this->imdb_id,
			'title'			=>	$this->title,
			'year'			=>	$this->year,
			'type'			=>	$this->type,
			'poster'		=>	$this->poster,
			'dialogs'		=>	$this->dialogs,
		];
    }
}
