<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRequests extends Migration
{
    public function up()
    {
       $this->forge->addField([
		   'req_id'=>[
			   'type'           => 'INT',
			   'constraint'     => 5,
			   'unsigned'       => true,
			   'auto_increment' => true,
		   ],
	       'req_method'=>[
			   'type'   => 'TEXT',
		       'null'   => false
	       ],
	       'req_start'=>[
			   'type' =>'DATETIME',
		       'null'=>false
	       ],
	       'req_end'=>[
		       'type' =>'DATETIME',
		       'null'=>false
	       ],
	       'req_body'=>[
			   'type'=>'JSON',
		       'null'=>false
	       ],
	       'created_at datetime default current_timestamp',
	       'updated_at datetime default current_timestamp on update current_timestamp',
       ]);
	   $this->forge->addPrimaryKey('req_id');
	   $this->forge->createTable('requests');
    }

    public function down()
    {
        $this->forge->dropTable('requests');
    }
}
