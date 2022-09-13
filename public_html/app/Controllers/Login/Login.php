<?php

namespace App\Controllers\Login;

use App\Controllers\Background\Logger;
use App\Controllers\BaseController;
use App\Controllers\SFasad;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Login extends BaseController
{
	use ResponseTrait;
    public function login()
    {
        return view('login');
    }
	
	
	public function checkpair()
	{
		$login = $this->request->getVar('login');
		$password = $this->request->getVar('password');
		$Users = model(UserModel::class);
		$user = $Users->first();
		if(!is_array($user)){
			return $this->respond(['result'=>'Пользователь не зарегистрирован'],200);
		}
		
		$code = 1111;
		
		$this->session->set('check_code',$code);
		$this->session->set('info',json_encode($user,256));
		
		return $this->respond(['result'=>'wait for code','name'=>$user['user_real_name']],200);
		
	}
	
	public function checkcode()
	{
		
		$code = $this->request->getVar('code');
		$user = json_decode($this->session->get('info'),true);
		if(($code == $this->session->get('check_code'))){
			$this->session->set('login',true);
			$this->session->set('user',$user);
			$this->session->remove('check_code');
			$this->session->remove('info');
			if($user['user_blocked']==1){
				Logger::CreateLog($user['user_id'],'Отказ Входа в систему Пользователь заблокирован');
				return $this->respond(['result'=>'Пользователь заблокирован'],200);
			}
			Logger::CreateLog($user['user_id'],'Вход в систему');
			return $this->respond(['result'=>'success'],200);
			
		}
		else{
			Logger::CreateLog($user['user_id'],'Ошибочный код подтверждения');
			return $this->respond(['result'=>'Неверный код'],200);
		}
	}
	
	public function logout()
	{
		$user = $this->session->get('user');
		$this->session->destroy();
		Logger::CreateLog($user['user_id'],'Выход');
		return redirect('/');
	}
	
	public function checkpairAdmin()
	{
		$login = $this->request->getVar('login');
		$password = $this->request->getVar('password');
		$Users = model(UserModel::class);
		$user = $Users->first();
		if(!is_array($user)){
			return $this->respond(['result'=>'Пользователь не зарегистрирован'],200);
		}
		$code =1111;
		
		$this->session->set('check_code',$code);
		$this->session->set('info',json_encode($user,256));
		//todo отправить код подтверждения в телеграм
		return $this->respond(['result'=>'wait for code','name'=>$user['user_real_name']],200);
		
	}
	public function checkcodeAdmin()
	{
		$user = json_decode($this->session->get('info'),true);
		$code = $this->request->getVar('code');
		if($code == $this->session->get('check_code')){
			$this->session->set('admin_login',true);
			$this->session->set('user',$user);
			$this->session->remove('check_code');
			$this->session->remove('info');
			if($user['user_blocked']==1){
				Logger::CreateLog($user['user_id'],'Отказ Входа в систему Пользователь заблокирован');
				return $this->respond(['result'=>'Пользователь заблокирован'],200);
			}
			Logger::CreateLog($user['user_id'],'Вход в админку');
			return $this->respond(['result'=>'success','sess'=>$this->session],200);
			
		}
		else{
			Logger::CreateLog($user['user_id'],'Неверный код подтверждения');
			return $this->respond(['result'=>'Неверный код'],200);
		}
	}
	
	public function newPassword(){
		$pass = $this->request->getVar('pass');
		$Users = model(UserModel::class);
		return $this->respond([],200);
	}
}
