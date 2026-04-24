<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    //RECUERDA:
    //La ruta necesitara un metodo del controlador para saber que vista renderizar
    public function index()
    {
        $data['titulo'] = 'Panel de Administrador';
        return view('admin/dashboard', $data);
    }
}