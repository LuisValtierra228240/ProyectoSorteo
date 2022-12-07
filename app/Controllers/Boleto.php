<?php

namespace App\Controllers;
use App\Models\BoletoModel;

class Boleto extends BaseController
{
    private $boletoModel;

    function __construct() 
    {
        $this->boletoModel = new BoletoModel();
    }
    public function Index()
    {
        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
            $boletos = $this->boletoModel->obtenerTodos();
    
            $data = [
                "usuario" => $usuario,
                "boletos" => $boletos
            ];
            
            return view('boleto/index', $data);
        }
        
        else {
            header("location: /Login");
            exit();
        }
    }

    public function Comprar($id_sorteo, $id_usuario) {
        $this->boletoModel->crear($id_sorteo, $id_usuario, date("y/m/d"));
        header("location: /boleto");
        exit();
    }
}