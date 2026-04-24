<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Rutas Publicas(Cualquier sitio dentro de la aplicacion que no requiere acceso)
$routes->get('/','AuthController::login');                      //RUTA RAIZ 
$routes->get('/auth/login','AuthController::login');            //Intento de Inicio Sesion
$routes->post('/auth/login','AuthController::verificar');    //Verificar la Sesion
$routes->get('/auth/logout','AuthController::logout');          //Cerrar Sesion

$routes->get('sin-permiso', function() { return view('errors/sin-permiso'); });

//Rutas Protegidas (Son las que requieren el inicio de sesion)
//El filtro tiene q estar Firmado
$routes->group('', ['filter' => 'auth'], function($routes){
    //Administradores
    $routes->group('admin', ['filter' => 'auth:administrador'], function($routes) {
        //Todas las rutas a la que solo los ADMINISTRADORES pueden entrar
        $routes->get('dashboard','Admin\DashboardController::index');
    });

    //Invitados
    $routes->group('invitado', ['filter' => 'auth:invitado'], function($routes) {
        //Todas las rutas permitidas a los INVITADOS
        $routes->get('panel','Invitado\PanelController::index');
    });
});
