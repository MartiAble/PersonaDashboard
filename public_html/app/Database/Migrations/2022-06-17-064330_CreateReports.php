<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReports extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'permiss_id'=>[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
	        'permiss_array'=>[
		        'type'           => 'JSON',
		        'null'           => false
	        ],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
		$this->forge->addPrimaryKey('permiss_id');
		$this->forge->createTable('permissions');
    }

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
