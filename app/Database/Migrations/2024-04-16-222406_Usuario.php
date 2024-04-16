<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' =>  [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ],
            'rolId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ],
            'lastName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ],
            'last_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE 
            ],
            'has_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ],
            'hash_expired' => [
                'type' => 'DATE',
                'null' => TRUE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('usuario');
        $password = '2811S4ulJM28!';
        $passwordHas =  password_hash(urlencode(base64_encode($password)), PASSWORD_DEFAULT);
        $data = [
            [
                'rolId' => '1',
                'name' => 'Saul',
                'lastName' => 'Juarez Martinez',
                'email' => 'saul@mail.com',
                'password' => $passwordHas,
                'created_at' => date('Y-m-d H:s:i')
            ]
        ];
        $this->db->table('usuario')->insertBatch($data);
    }

    public function down()
    {
        //
        $this->forge->dropTable('usuario', TRUE);
    }
}