<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_login','user_password','user_telegram_id','user_role_id','user_group_id','user_mcp','user_s_id','user_real_name','user_blocked','user_token','user_refresh_token','user_permissions','user_obj_id'];

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
	
	
	public function getUserByLogin($login)
	{
		return $this->select(
			[
				'usergroups.group_name',
				'usergroups.group_permissions',
				'userroles.role_name',
				'userroles.role_permissions',
				'users.user_id',
				'users.user_login',
				'users.user_password',
				'users.user_telegram_id',
				'users.user_mcp',
				'users.user_s_id',
				'users.user_real_name',
				'users.user_blocked',
				'users.user_token',
				'users.user_refreshtoken',
				'users.user_permissions',
				'objects.object_name'
			]
		
		)->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
		 ->join('userroles','userroles.role_id = users.user_role_id','LEFT')
		 ->join('objects','users.user_obj_id = objects.object_id','LEFT')
		 ->where('users.user_login',$login)->first();
			
	}
	
	public function getAdminByLogin($login)
	{
		return $this->select(
			[
				'usergroups.group_name',
				'usergroups.group_permissions',
				'userroles.role_name',
				'userroles.role_permissions',
				'users.user_id',
				'users.user_login',
				'users.user_password',
				'users.user_telegram_id',
				'users.user_mcp',
				'users.user_s_id',
				'users.user_real_name',
				'users.user_blocked',
				'users.user_token',
				'users.user_refreshtoken',
				'users.user_permissions'
			]
		
		)->join('usergroups','usergroups.group_id = users.user_group_id','LEFT')
			->join('userroles','userroles.role_id = users.user_role_id','LEFT')
			->where('users.user_login',$login)->where('users.user_group_id',1)->first();
		
	}
	
	public function getCount()
	{
		return $this->findAll();
	}
}
