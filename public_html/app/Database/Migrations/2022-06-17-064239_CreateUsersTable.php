<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
	        'user_id' => [
		        'type'           => 'INT',
		        'constraint'     => 5,
		        'unsigned'       => true,
		        'auto_increment' => true,
	        ],
	        'user_login' =>[
				'type'      => 'TEXT',
		        'null'      => false
	        ],
	        'user_password' =>[
				'type'      =>'TEXT',
		        'null'      => false
	        ],
	        'user_telegram_id' =>[
				'type'      =>'INT',
		        'null'      => true
	        ],
	        'user_role_id'  =>[
				'type'  => 'INT',
		        'null'  => false,
	        ],
	        'user_group_id' =>[
				'type'  => 'INT',
		        'null'  => false
	        ],
			'user_mcp'=>[
				'type'  => 'INT',
				'default' => 1
			],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
		$this->forge->addPrimaryKey('user_id');
		$this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
