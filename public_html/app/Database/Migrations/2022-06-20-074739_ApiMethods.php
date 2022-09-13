<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApiMethods extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'method_id'=>[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
	        'method_name'=>[
		        'type'           => 'TEXT',
		        'null'      => false
	        ],
	        'method_body'=>[
		        'type'           => 'TEXT',
		        'null'      => false
	        ],
	        'method_description'=>[
		        'type'           => 'TEXT',
		        'null'      => true
	        ]
			
        ]);
		$this->forge->addPrimaryKey('method_id');
		$this->forge->createTable('methods');
    }

    public function down()
    {
        $this->forge->dropTable('methods');
    }
}
