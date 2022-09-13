<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SFasad extends BaseController
{
    public function index()
    {
        //
    }
	
	public static function say($id,$code)
	{
		
		$param =['UserID'=>$id,'Confirmation_code'=>$code];
		$options=[
			
			"Method"=>"SendToTelegram",
			"Parameters"=>$param
			
		];
		
		$ch = curl_init('http://81.30.209.224:34560/fitness/hs/api_pf/reports/');
		curl_setopt($ch, CURLOPT_USERPWD, 'ExchangePF:Htcehc0410');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($options));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$html = curl_exec($ch);
		
		$response=json_decode($html,true);
		curl_close($ch);
		
		
		
		return $html;
	
	}
	
	
	public static function userInfo($id)
	{
		
		$param =['UserID'=>$id];
		$options=[
			
			"Method"=>"GetUserFIO",
			"Parameters"=>$param
		
		];
		
		$ch = curl_init('http://81.30.209.224:34560/fitness/hs/api_pf/reports/');
		curl_setopt($ch, CURLOPT_USERPWD, 'ExchangePF:Htcehc0410');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($options));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$html = curl_exec($ch);
		
		$data=json_decode($html,true);
		$data['Parameters']['Result'] = str_replace('  ',' ',$data['Parameters']['Result']);
		$fio = explode(' ',$data['Parameters']['Result']);
		curl_close($ch);
		
		
		
		return $data['Parameters']['Result'];
		
	}
	
	public static function barrier($phone)
	{
		
		$param =['Phone'=>$phone,];
		$options=[
			
			"Method"=>"CheckNumber",
			"Parameters"=>$param
		
		];
		
		$ch = curl_init('http://81.30.209.224:34560/fitness/hs/api_pf/barrier/');
		curl_setopt($ch, CURLOPT_USERPWD, 'ExchangePF:Htcehc0410');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($options));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$html = curl_exec($ch);
		
		$response=json_decode($html,true);
		curl_close($ch);
		
		
		
		return $html;
		
	}
	
	
	public static function getReport($userID,$start,$end,$reportName)
	{
		
		$param =['UserID'=>$userID,'StartDate'=>$start,'EndDate'=>$end];
		$options=[
			
			"Method"=>$reportName,
			"Parameters"=>$param
		
		];
		
		$ch = curl_init('http://81.30.209.224:34560/fitness/hs/api_pf/reports/');
		curl_setopt($ch, CURLOPT_USERPWD, 'ExchangePF:Htcehc0410');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($options));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$html = curl_exec($ch);
		
		$data=json_decode($html,true);
		
		
		
		return $data['Parameters']['Result'];
		
	}
}
