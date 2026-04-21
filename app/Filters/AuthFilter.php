<?php

//¿Donde estoy?
namespace App\Filters;
//¿Que necesito?
use CodeIgniter\Filters\FilterInterface;    //Interface = Contrato
use CodeIgniter\HTTP\RequestInterface;      //Consultas
use CodeIgniter\HTTP\ResponseInterface;     //Respuestas

//¿MIDDLEWARE?
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        //Iniciar el objeto administrador de sessiones (Ci4)
        $session = session();
        
        //El usuario no inicio sesion... enviar al login
        if (!$session->get('usuario_id')){
            //Redirecciona y Agrega una mensaje en la clave error
            return redirect()->to('/auth/login')->with('error','Debes iniciar session');
        }

        //El usuario si inicio session, pero trata de ingresar a un perfil incorrecto
        if($arguments){
            // Identificacion el nivel de acceso = administrador | invitado
            $nivelRequerido = $arguments[0] ?? null;
            // Ya tenemos identificado el nivel, ¿es el mismo que el almacenado en la session?
            if($nivelRequerido && $session->get('nivelacceso') !== $nivelRequerido){
                return redirect()->to('/sin-permiso');
            }
        }

    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}