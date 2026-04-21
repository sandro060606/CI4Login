<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {   
        //Se creara 2 usuarios, un admin - invitado
        $data = [
           ['nombreusuario' => 'administrador', 'claveacceso' => password_hash('admin123', PASSWORD_DEFAULT), 'nivelacceso' => 'administrador' ],
           ['nombreusuario' => 'invitado', 'claveacceso' => password_hash('invitado123', PASSWORD_DEFAULT), 'nivelacceso' => 'invitado' ]
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}
