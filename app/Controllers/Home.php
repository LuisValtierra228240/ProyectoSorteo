<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
    
            $data = [
                "usuario" => $usuario
            ];
            
            return view('index', $data);
        }
        
        else {
            header("location: /Login");
            exit();
        }
    }
}
