<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{

    private $usuarioModel;
    
    function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $usuarios = $this->usuarioModel->findAll();
        
        $data = [
            "usuarios" => $usuarios
        ];

        return view('usuario/index', $data);
    }
}
