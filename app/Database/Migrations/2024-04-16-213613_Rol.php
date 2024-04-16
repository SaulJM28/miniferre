<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rol extends Migration
{
    public function up()
    {
        //creamos la estructura de la tabla
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unsigned' => FALSE
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unsigned' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ]
        ]);
        //anadimos la llave foranea
        $this->forge->addKey('id', TRUE);
        //Creamos la tabla
        $this->forge->createTable('rol');
        //agregamos registros
        $data = [
            [
                'name' => '1',
                'description' => 'administrador del sistema',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => '2',
                'description' => 'operador',
                'created_at' => date('Y-m-d H:i:s')
            ]  
        ];
        //realizamos el insert
        $this->db->table('rol')->insertBatch($data);
        
    }

    public function down()
    {
        //
        $this->forge->dropTable('rol', TRUE);
    }
}