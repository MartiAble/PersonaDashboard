<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateObserveObjectsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
	        'object_id' => [
		        'type'           => 'INT',
		        'constraint'     => 5,
		        'unsigned'       => true,
		        'auto_increment' => true,
	        ],
	        'object_s_id' => [
		        'type'           => 'TEXT',
		        'null'      => false
	        ],
	
	        'object_name' =>[
		        'type'      => 'TEXT',
		        'null'      => false
	        ],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
	    $this->forge->addPrimaryKey('object_id');
	    $this->forge->createTable('objects');
    }

    public function down()
    {
       $this->forge->dropTable('objects');
    }
}
