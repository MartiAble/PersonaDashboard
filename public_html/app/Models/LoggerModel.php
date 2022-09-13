<?php

namespace App\Models;

use CodeIgniter\Model;

class LoggerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'logs';
    protected $primaryKey       = 'log_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','action'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
	
	/**
	 * @param int $user_id
	 * @param string $action
	 * @return bool
	 * Создает запись в логах
	 */
	public function createRecord(int $user_id, string $action): bool
	{
		return $this->insert(['user_id'=>$user_id,'action'=>$action]);
		
	}
	
	/**
	 * @param int $user_id
	 * @param string|null $start
	 * @param string|null $stop
	 * @return array
	 * Возвращает все логи пользователя за указанный/весь период
	 */
	public function getLogsByUser(int  $user_id, string $start = null, string $stop = null):array
	{
		$result = null;
		if(is_null($start)&& is_null($stop)){
			$result =  $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.user_id'=>$user_id])->findAll();
		}
		if(!is_null($start)&&is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.user_id'=>$user_id])
				->where(['logs.created_at >'=>  $start])->findAll();
		}
		if(is_null($start)&&!is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.user_id'=>$user_id])
				->where(['logs.created_at <'=>  $stop])->findAll();
		}
		if(is_null($start)&&!is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.user_id'=>$user_id])
				->where(['logs.created_at >'=>  $start])
				->where(['logs.created_at <'=>  $stop])->findAll();
		}
		return(is_array($result))?$result:[];
		
	}
	
	/**
	 * @param string $action
	 * @param string|null $start
	 * @param string|null $stop
	 * @return array
	 * Возвращает логи по действию пользователей за весь/указанный период
	 */
	public function getLogsByAction(string $action, string $start = null, string $stop = null):array
	{
		$result = null;
		if(is_null($start)&& is_null($stop)){
			$result =  $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.action'=>$action])->findAll();
		}
		if(!is_null($start)&&is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.action'=>$action])
				->where(['logs.created_at >'=>  $start])->findAll();
		}
		if(is_null($start)&&!is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.action'=>$action])
				->where(['logs.created_at <'=>  $stop])->findAll();
		}
		if(is_null($start)&&!is_null($stop)){
			$result = $this->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
				->join('users','users.user_id = logs.user_id','LEFT')
				->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
				->join('userroles','userroles.role_id = users.user_role_id','LEFT')
				->where(['logs.action'=>$action])
				->where(['logs.created_at >'=>  $start])
				->where(['logs.created_at <'=>  $stop])->findAll();
		}
		return(is_array($result))?$result:[];
	}
	
	/**
	 * @return array
	 * Возвращает список всех действий
	 */
	public function getActions(): array
	{
		return $this->select('DISTINCT(action)')->findAll();
	}
	
	public function getDaylyReport()
	{
		$start  = date('Y-m-d 00:00:00');
		$finish  = date('Y-m-d 23:59:59');
		return $this
			->select(
				[
					'logs.created_at',
					'logs.action',
					'users.user_login',
					'users.user_real_name',
					'usergroups.group_name',
					'userroles.role_name'
				])
			->join('users','users.user_id = logs.user_id','LEFT')
			->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
			->join('userroles','userroles.role_id = users.user_role_id','LEFT')
			->where(['logs.created_at >'=>  $start])->where(['logs.created_at <'=>  $finish])->findAll();
		
	}
}
