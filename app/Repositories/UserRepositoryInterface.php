<?php

namespace App\Repositories;

interface UserRepositoryInterface {

	public function getUserDialogs($username);

	public function getActiveUsers();

}