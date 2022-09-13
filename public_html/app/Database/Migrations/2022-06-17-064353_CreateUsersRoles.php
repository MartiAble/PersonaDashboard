<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
	        'role_id' => [
		        'type'           => 'INT',
		        'constraint'     => 5,
		        'unsigned'       => true,
		        'auto_increment' => true,
	        ],
	
	        'role_name' =>[
		        'type'      => 'TEXT',
		        'null'      => false
	        ],
	        'role_group_id'=>[
				'type'=>'INT',
		        'null'=>false
	        ],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
	    $this->forge->addPrimaryKey('role_id');
	    $this->forge->createTable('userroles');
    }

    public function down()
    {
        $this->forge->dropTable('userroles');
    }
}
