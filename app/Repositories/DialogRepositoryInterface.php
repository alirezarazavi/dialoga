<?php

namespace App\Repositories;

interface DialogRepositoryInterface {

	public function findAll($sortType);

	public function find($imdbId);

}