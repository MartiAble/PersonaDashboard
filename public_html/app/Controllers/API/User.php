<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Controllers\SFasad;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
	use ResponseTrait;
    public function index()
    {
		$start = $this->request->getVar('start');
		$end = $this->request->getVar('end');
		if(!$start){$start = date('01.m.Y');}
		if(!$end){$end = date('d.m.Y');}

	    $User = $this->session->get('user');
	    $monthArr = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
	    $currentmoth = date('m')-1;
	    $month = [];
	    for($i=0; $i<$currentmoth; $i++){
		    array_push($month,$monthArr[$i]);
	    }

	    $current = SFasad::getReport('338e05a4-bfa0-11ec-80da-3497f65a1648'/*$user['user_s_id']*/,$start,$end,'GetPlanFakt');
		$appg = SFasad::getReport('338e05a4-bfa0-11ec-80da-3497f65a1648'/*$user['user_s_id']*/,date('01.m.Y',strtotime($start.'-1 Year')),date('d.m.Y',strtotime($end.'-1 Year')),'GetPlanFakt');

       /* for($i = 0,$iMax=count($current); $i<$iMax; $i++){
			$current[$i]['TotalPlan'] = number_format($current[$i]['TotalPlan'],0,'.',' ');
	        $current[$i]['CurrentPlan'] = number_format($current[$i]['CurrentPlan'],0,'.',' ');
	        $current[$i]['SummFact'] = number_format($current[$i]['SummFact'],0,'.',' ');
        }
	    for($i = 0,$iMax=count($appg); $i<$iMax; $i++){
		    $appg[$i]['TotalPlan'] = number_format($appg[$i]['TotalPlan'],0,'.',' ');
		    $appg[$i]['CurrentPlan'] = number_format($appg[$i]['CurrentPlan'],0,'.',' ');
		    $appg[$i]['SummFact'] = number_format($appg[$i]['SummFact'],0,'.',' ');
	    }*/
		return view('user/planFakt',['content'=>[
			'current'=>$current,
			'appg'=>$appg,
	        ],
			'month'=>$month,
			'start'=>date('Y-m-d',strtotime($start)),
			'end'=>date('Y-m-d',strtotime($end)),
			'startSTR'=>date('d.m.Y',strtotime($start)),
			'endSTR'=>date('d.m.Y',strtotime($end))
		]);
    }

	public function getInfo(){
		$start = $this->request->getVar('start');
		$end = $this->request->getVar('end');
		$user = $this->session->get('user');
		$startM= date('m',strtotime($start));
		$endM = date('m',strtotime($end));
		$current = SFasad::getReport('338e05a4-bfa0-11ec-80da-3497f65a1648'/*$user['user_s_id']*/,date('d.m.Y',strtotime($start)),date('d.m.Y',strtotime($end)),'GetPlanFakt');
		sllep(2);
		$appg = SFasad::getReport('338e05a4-bfa0-11ec-80da-3497f65a1648'/*$user['user_s_id']*/,date('d.m.Y',strtotime($start.'- 1 Year')),date('d.m.Y',strtotime($end.'-1 Year')),'GetPlanFakt');

		for($i = 0,$iMax=count($current); $i<$iMax; $i++){
			$current[$i]['TotalPlan'] = number_format($current[$i]['TotalPlan'],0,'.',' ');
			$current[$i]['CurrentPlan'] = number_format($current[$i]['CurrentPlan'],0,'.',' ');
			$current[$i]['SummFact'] = number_format($current[$i]['SummFact'],0,'.',' ');
		}
		for($i = 0,$iMax=count($appg); $i<$iMax; $i++){
			$appg[$i]['TotalPlan'] = number_format($appg[$i]['TotalPlan'],0,'.',' ');
			$appg[$i]['CurrentPlan'] = number_format($appg[$i]['CurrentPlan'],0,'.',' ');
			$appg[$i]['SummFact'] = number_format($appg[$i]['SummFact'],0,'.',' ');
		}
		return $this->respond(['content'=>
			[
				'current'=>$current,
				'appg'=>$appg
			],
			'start'=>date('d.m.Y',strtotime($start)),
			'end'=>date('d.m.Y',strtotime($end))
		],200);
	}

	public function getDatePeriod(){
		$month = $this->request->getVar('month');
		if($month <10){$month='0'.$month;}
		$start = date('Y-'.$month.'-01');
		$end = date('Y-'.$month.'-t',strtotime($start));
		return $this->respond(['start'=>$start,'end'=>$end],200);
	}
}
