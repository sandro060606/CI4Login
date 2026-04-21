<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addfield([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nombreusuario' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true
            ],
            'claveacceso' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nivelacceso' => [
                'type' => 'ENUM',
                'constraint' => ['administrador', 'invitado'],
                'default' => 'invitado'
            ],
        ]);

        //PK
        $this->forge->addPrimaryKey('id');

        //Construye la Tabla
        $this->forge->createTable('usuarios');

    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
