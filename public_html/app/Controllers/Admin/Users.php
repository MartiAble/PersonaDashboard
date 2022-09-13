<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
	public static function getCount()
	{
		$UsersModel = model(UserModel::class);
		$result = $UsersModel->getCount();
		return count($result);
	}
}
