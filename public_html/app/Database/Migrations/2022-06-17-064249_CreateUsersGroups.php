<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersGroups extends Migration
{
    public function up()
    {
	    $this->forge->addField([
	    'group_id' => [
	    'type'           => 'INT',
	    'constraint'     => 5,
	    'unsigned'       => true,
	    'auto_increment' => true,
    ],
	   
		'group_name' =>[
	    'type'      => 'TEXT',
	    'null'      => false
    ],
	   
	   'group_permissions' =>[
	    'type'      =>'INT',
	    'null'      => false
    ],
	   
	'created_at datetime default current_timestamp',
	'updated_at datetime default current_timestamp on update current_timestamp',
     ]);
		$this->forge->addPrimaryKey('group_id');
		$this->forge->createTable('usergroups');
    }

    public function down()
    {
        $this->forge->dropTable('usergroups');
    }
}
