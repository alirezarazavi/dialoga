<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface {

	public function getUserDialogs($username);

	public function getActiveUsers();

	public function getUserDialogPoints($userId);

	public function getUserDialogsLikes($username);

}