<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'unique'         =>  TRUE,
                'constraint'     => '255',
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
                'default'        => NULL,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
                'default'        => NULL,
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('user');
	}
}
