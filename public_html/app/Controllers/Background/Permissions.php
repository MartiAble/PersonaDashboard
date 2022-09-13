<?php

namespace App\Controllers\Background;

use App\Controllers\BaseController;
use function PHPUnit\Framework\isJson;

class Permissions extends BaseController
{
	/**
	 * @param string|null $group
	 * @param string|null $role
	 * @param string|null $user
	 * @return array
	 * Возвращает список доступных методов для пользователя
	 */
    public static function collectPermissions (string $group=null, string $role=null, string $user=null): array
    {
		$result = [];
		if(isJson($group)){
			$group = json_decode($group,true);
			foreach ($group as $key=>$val)
			{
				$result[$key][] = $val;
			}
		}
	    if(isJson($role)){
		    $role = json_decode($role,true);
		    foreach ($role as $key=>$val)
		    {
			    $result[$key][] = $val;
		    }
	    }
	    if(isJson($user)){
		    $user = json_decode($user,true);
		    foreach ($user as $key=>$val)
		    {
			    $result[$key][] = $val;
		    }
	    }
		return $result;
    }
}
