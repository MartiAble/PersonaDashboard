<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ApiRequestsModel;


class APImethods extends BaseController
{
	public static function getCount()
	{
		$ApiMethods = model(ApiRequestsModel::class);
		$result = $ApiMethods->getCount();
		return count($result);
	}
}
