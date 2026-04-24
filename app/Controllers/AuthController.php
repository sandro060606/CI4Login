<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use Config\Validation;

class AuthController extends Controller
{
    public function login()
    {
        //Si hay una Session, redirigir segun el rol
        if (session()->get('usuario_id')) {
            return $this->redirigirSegunRol();
        }

        //No inicio Sesion
        return view('auth/login');
    }
    public function verificar()
    {
        //Middleware (Function intermedia | Mecanismo de Validacion)
        //Validacion 1: los datos de inicio de sesion deben cumplir una longitud
        $rules = [
            'nombreusuario' => 'required|min_length[3]',
            'claveacceso' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        //Validacion 2: Ya tenemos los datos, ¿Existe el Usuario?, ¿Su Contraseña es correcta?
        $model = new UsuarioModel();
        $usuario = $model->verificarCredenciales(
            $this->request->getPost('nombreusuario'),
            $this->request->getPost('claveacceso')
        );
        //Ingreso usuario incorrecto
        if (!$usuario){
            return redirect()->back()->withInput()->with('error', 'Usuario o Contraseña Incorrecta');
        }
        //Llegado a este punto, el usuario LOGRO INICIAR SESION CORRECTAMENTE
        session()->set([
            'usuario_id' => $usuario->id,
            'nombreusuario' => $usuario->nombreusuario,
            'nivelacceso' => $usuario->nivelacceso,
            'logged_in' => true
        ]);

        return $this->redirigirSegunRol();
    }
    public function logout()
    {
        //Cerrar Session
        session()->destroy();
        return redirect()->to('auth/login')->with('info', 'Session Cerrada Correctamente');
    }
    public function redirigirSegunRol()
    {
        //Es imposible llegar a este metodo, si no hemos realizado el inicio de session
        return session()->get('nivelacceso') === 'administrador' ?
            redirect()->to('/admin/dashboard') : redirect()->to('/invitado/panel');

    }
}