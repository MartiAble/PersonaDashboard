<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class Roles extends BaseController
{
	public static function getCount()
	{
		$RoleModel = model(RolesModel::class);
		$result = $RoleModel->getCount();
		return count($result);
	}
}
