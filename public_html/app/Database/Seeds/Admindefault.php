<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admindefault extends Seeder
{
    public function run()
    {
       $password = '$2y$10$VExFm6A1HMILdWmqtSy7oOL2r/6ToVQlx828TcneKbPD8SyI66jf2'; //123
	   $login = 'Администратор';
	    $sql = 'INSERT INTO users SET  user_login = "'.$login.'", user_password = "'.$password.'", user_role_id = "1", user_group_id = "1"';
	    $this->db->query($sql);
		$sql = 'INSERT INTO userroles SET role_name = "Администратор", role_group_id = "1"';
	    $this->db->query($sql);
		$permissions = ['all_permissions'=>true];
		$sql = 'INSERT INTO usergroups SET group_name = "Администраторы", group_permissions = "1"';
	    $this->db->query($sql);
	    $sql = 'INSERT INTO permissions SET permiss_array = '.json_encode($permissions);
	    $this->db->query($sql);
    }
}
