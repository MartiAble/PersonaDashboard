<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CacheRequestsModel;

class CacheRequest extends BaseController
{
	public static function getCount()
	{
		$CacheModel = model(CacheRequestsModel::class);
		$result = $CacheModel->getCount();
		return count($result);
	}
}
