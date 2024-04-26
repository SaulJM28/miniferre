<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Producto extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id" => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE 
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE 
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE 
            ],
            'brand' => [ //marca
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE 
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('producto');
    }

    public function down()
    {
        //
        $this->forge->dropTable('producto', TRUE);
    }
}