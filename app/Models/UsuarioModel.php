<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['nombreusuario', 'claveacceso', 'nivelacceso'];

    public function verificarCredenciales(string $usuario, string $clave): ?object{
        //Verificar si existe el Usuario
        $row = $this->where('nombreusuario', $usuario)->first();

        //Asumimos que el usuario existe... entonces validamos la clave
        if ($row && password_verify($clave, $row->claveacceso)){
            //Acceso es Correcto
            return $row;
        }

        //El usuario NO existe, retornamos null
        return null;
    }
}