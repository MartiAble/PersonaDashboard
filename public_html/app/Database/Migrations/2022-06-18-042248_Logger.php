<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Logger extends Migration
{
    public function up()
    {
        $this->forge->addField([
	        'log_id' => [
		        'type'           => 'INT',
		        'constraint'     => 5,
		        'unsigned'       => true,
		        'auto_increment' => true,
	        ],
	        'user_id'=>[
		        'type'           => 'INT',
		        'constraint'     => 5,
		        'unsigned'       => true,
	        ],
	        'action'=>[
				'type'=>'TEXT',
	        ],
	        'created_at datetime default current_timestamp',
	        'updated_at datetime default current_timestamp on update current_timestamp',
	        
        ]);
	    $this->forge->addPrimaryKey('log_id');
	    $this->forge->createTable('logs');
    }

    public function down()
    {
        $this->forge->dropTable('logs');
    }
}
