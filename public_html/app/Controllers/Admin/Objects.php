<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ObjectsModel;

class Objects extends BaseController
{
	  
	
    public function getAll()
    {
	    $ObjModel = model(ObjectsModel::class);
		return $ObjModel->findAll();
    }
	
	public static function getCount()
	{
		$ObjModel = model(ObjectsModel::class);
		$result = $ObjModel->getCount();
		return count($result);
	}
}
