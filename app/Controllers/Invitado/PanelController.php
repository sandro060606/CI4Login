<?php

namespace App\Controllers\Invitado;

use CodeIgniter\Controller;

class PanelController extends Controller
{
    //RECUERDA:
    //La ruta necesitara un metodo del controlador para saber que vista renderizar
    public function index()
    {
        $data['titulo'] = 'Panel de Invitado';
        return view('invitado/panel', $data);
    }
}