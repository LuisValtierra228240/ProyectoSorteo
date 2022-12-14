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

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
            $usuarios = $this->usuarioModel->findAll();
    
            $data = [
                "usuario" => $usuario,
                "usuarios" => $usuarios
            ];
            
            return view('usuario/index', $data);
        }
        
        else {
            header("location: /Login");
            exit();
        }
    }
}
