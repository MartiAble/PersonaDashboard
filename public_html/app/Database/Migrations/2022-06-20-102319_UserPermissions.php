<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPermissions extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'f_id'=>[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'f_group'=>[
				'type'           => 'TEXT',
				'null'           => false
			],
			'f_name'=>[
				'type'           => 'TEXT',
				'null'           => false
			],
			'f_alias'=>[
				'type'           => 'TEXT',
				'null'           => false
			],
			'f_description'=>[
				'type'           => 'TEXT',
				'null'           => false
			],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
		$this->forge->addPrimaryKey('f_id');
		$this->forge->createTable('functions');
    }

    public function down()
    {
        $this->forge->dropTable('functions');
    }
}
