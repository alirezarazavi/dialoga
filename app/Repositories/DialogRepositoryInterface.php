<?php

namespace App\Repositories;

interface DialogRepositoryInterface {

	public function findAll();

	public function find($imdbId);

}