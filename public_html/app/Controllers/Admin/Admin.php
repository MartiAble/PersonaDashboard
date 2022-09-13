<?php

namespace App\Controllers\Admin;

use App\Controllers\Background\Logger;
use App\Controllers\BaseController;
use App\Controllers\SFasad;
use App\Models\ApiRequestsModel;
use App\Models\CacheRequestsModel;
use App\Models\ObjectsModel;
use App\Models\RolesModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Admin extends BaseController
{
	use ResponseTrait;
    public function index()
    {
	    $user =  $this->session->get('user');

		return view('admin/lk',[
			'name'=>$user['user_real_name'],
			'ObjectsCount'=>Objects::getCount(),
			'UserGroupsCount'=>Groups::getCount(),
			'RolesCount'=>Roles::getCount(),
			'QueryCount'=>APImethods::getCount(),
			'CacheCount'=>CacheRequest::getCount(),
			'UserCount'=>Users::getCount(),
			'Logs'=> Logger::getDaylyReport(),
			'LogFilter'=>'Всем',
			'LogStart'=>date('d-m-Y'),
			'LogEnd'=>date('d-m-Y')
		]);
    
    }
	
	public function login()
	{
		
		return view('admin_login');
	}
	
	public function userADD(){
		return $this->respond(['name'=>SFasad::userInfo($this->request->getVar('id'))]);
	}
	
	public function getGroups(){
		$GroupModel = model(\App\Models\Groups::class);
		return $this->respond(['response'=>$GroupModel->findAll()]);
	}
	
	public function getObjects(){
		$ObjectModel = model(\App\Models\ObjectsModel::class);
		return $this->respond(['response'=>$ObjectModel->findAll()]);
	}
	
	public function getAvaluableRoles(){
		$RolesModel = model(RolesModel::class);
		return $this->respond(['response'=>$RolesModel->where(['role_group_id'=>$this->request->getVar('group_id')])->findAll()]);
	}
	public function createUser(){
		$user = json_decode($this->request->getVar('info'),true);
		$UserModel = model(UserModel::class);
		$UserModel->insert(['user_login'=>$user['login'],'user_password'=>password_hash($user['password'],PASSWORD_DEFAULT),'user_group_id'=>$user['group'],'user_role_id'=>$user['role'],'user_s_id'=>$user['sid'],'user_real_name'=>$user['name'],'user_obj_id'=>$user['object']],true);
		$userNew = $UserModel->getUserByLogin($user['login']);
		if($user['group']==1){
			SFasad::say($user['sid'],'Вы зарегистрированы в системе отчетов https://report.personasportmobile.ru'.PHP_EOL.
				' и её админке https://report.personasportmobile.ru/admin'
				.PHP_EOL.'Ваш логин: '.$user['login']
				.PHP_EOL.'Ваш временный пароль: '.$user['password']
				.PHP_EOL.'Вы состоите в группе: '.$userNew['group_name']
				.PHP_EOL.'Роль пользователя: '.$userNew['role_name']
				.PHP_EOL.'Привязка к объекту: '.$userNew['object_name']
			);
		}
		else{
			SFasad::say($user['sid'],'Вы зарегистрированы в системе отчетов https://report.personasportmobile.ru'
				.PHP_EOL.'Ваш логин: '.$user['login']
				.PHP_EOL.'Ваш временный пароль: '.$user['password']
				.PHP_EOL.'Вы состоите в группе: '.$userNew['group_name']
				.PHP_EOL.'Роль пользователя: '.$userNew['role_name']
				.PHP_EOL.'Привязка к объекту: '.$userNew['object_name']
			);
		}
		
		return $this->respond(['response'=>$userNew]);
	}
	
	
	public function getList(){
		$ObjectsModel = model(ObjectsModel::class);
		$GroupsModel = model(\App\Models\Groups::class);
		$RolesModel = model(RolesModel::class);
		$UsersModel = model(UserModel::class);
		$ReportsModel = model(ApiRequestsModel::class);
		$CacheModel = model(CacheRequestsModel::class);
		$var = $this->request->getVar('list');
		if($var == 'objects'){
			$response = $ObjectsModel->findAll();
		}
		elseif($var == 'groups'){
			$response = $GroupsModel->findAll();
		}
		elseif($var == 'roles'){
			$response = $RolesModel->findAll();
		}
		elseif($var == 'users'){
			$response = $UsersModel->findAll();
		}
		elseif($var == 'reports'){
			$response = $ReportsModel->findAll();
		}
		elseif($var == 'cache'){
			$response = $CacheModel->findAll();
		}
		return $this->respond(['response'=>$response]);
	}
	
	
	public function deleteOP(){
		$ObjectsModel = model(ObjectsModel::class);
		$GroupsModel = model(\App\Models\Groups::class);
		$RolesModel = model(RolesModel::class);
		$UsersModel = model(UserModel::class);
		$ReportsModel = model(ApiRequestsModel::class);
		$CacheModel = model(CacheRequestsModel::class);
		if($this->request->getVar('table')=='objects'){
			$ObjectsModel->delete($this->request->getVar('id'));
		}
		if($this->request->getVar('table')=='usergroups'){
			$GroupsModel->delete($this->request->getVar('id'));
		}
		return $this->respond(['table'=>$this->request->getVar('table'),'id'=>$this->request->getVar('id')]);
	}
	
	public function createObject(){
		$ObjectsModel = model(ObjectsModel::class);
		$GroupsModel = model(\App\Models\Groups::class);
		$RolesModel = model(RolesModel::class);
		$UsersModel = model(UserModel::class);
		$ReportsModel = model(ApiRequestsModel::class);
		$CacheModel = model(CacheRequestsModel::class);
		if($this->request->getVar('table')=='objects'){
			$ObjectsModel->insert(['object_s_id'=>'..','object_name'=>$this->request->getVar('name')]);
		}
		if($this->request->getVar('table')=='usergroups'){
			$GroupsModel->insert(['group_permissions'=>0,'group_name'=>$this->request->getVar('name')]);
		}
		
		return true;
	}
	public function updateObject(){
		$ObjectsModel = model(ObjectsModel::class);
		$GroupsModel = model(\App\Models\Groups::class);
		$RolesModel = model(RolesModel::class);
		$UsersModel = model(UserModel::class);
		$ReportsModel = model(ApiRequestsModel::class);
		$CacheModel = model(CacheRequestsModel::class);
		if($this->request->getVar('table')=='objects'){
			$ObjectsModel->update($this->request->getVar('id'),['object_name'=>$this->request->getVar('name')]);
		}
		if($this->request->getVar('table')=='usergroups'){
			$GroupsModel->update($this->request->getVar('id'),['group_name'=>$this->request->getVar('name')]);
		}
		return true;
	}
	
	public function getRolesByGroupID(){
		$id = $this->request->getVar('id');
		$RolesModel = model(RolesModel::class);
		return $this->respond($RolesModel->where(['role_group_id'=>$id])->find(),200);
	}
	
	public function addRole(){
		$groupID = $this->request->getVar('group');
		$groupID++;
		$name = $this->request->getVar('name');
		$RolesModel = model(RolesModel::class);
		$RolesModel->insert(['role_name'=>$name,'role_group_id'=>$groupID]);
		return $this->respond($RolesModel->where(['role_group_id'=>$groupID])->find(),200);
	}
	
	public function editRole(){
		$ID = $this->request->getVar('id');
		$groupID = $this->request->getVar('group');
		$groupID++;
		$name = $this->request->getVar('name');
		$RolesModel = model(RolesModel::class);
		$RolesModel->update($ID,['role_name'=>$name]);
		return $this->respond($RolesModel->where(['role_group_id'=>$groupID])->find(),200);
	}
	public function deleteRole(){
		$groupID = $this->request->getVar('group');
		$groupID++;
		$ID = $this->request->getVar('id');
		$RolesModel = model(RolesModel::class);
		$RolesModel->delete($ID);
		return $this->respond($RolesModel->where(['role_group_id'=>$groupID])->find(),200);
	}
}
