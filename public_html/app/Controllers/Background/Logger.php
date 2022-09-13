<?php

namespace App\Controllers\Background;

use App\Controllers\BaseController;
use App\Models\LoggerModel;

class Logger extends BaseController
{
	 
	
	
    public static function CreateLog(int $user_id, string $action)
    {
		$Model = model(LoggerModel::class);
		$Model->createRecord($user_id,$action);
    }
	
	public static function getLogsByUser(int $user_id, string $start = null, string $stop = null)
	{
		$Model = model(LoggerModel::class);
		$result = $Model->getLogsByUser($user_id, $start, $stop);
		return $result;
	}
	
	public static function getLogsByAction(string $action, string $start = null, string $stop = null):array
	{
		$Model = model(LoggerModel::class);
		$result =  $Model->getLogsByAction($action,$start,$stop);
		return $result;
	}
	
	public static function getActions(): array
	{
		$Model = model(LoggerModel::class);
		$result = [];
		foreach ($Model->getActions() as $el)
		{
			$result[]=$el['action'];
		}
		return $result;
	}
	
	
	public static function getDaylyReport()
	{
		$Model = model(LoggerModel::class);
		$result = [];
		foreach($Model->getDaylyReport() as $row) {
			$result[]=$row;
		        }
		return $result;
	}
}
