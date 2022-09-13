<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Groups extends BaseController
{
	public static function getCount()
	{
		$GroupModel = model(\App\Models\Groups::class);
		$result = $GroupModel->getCount();
		return count($result);
	}
}
