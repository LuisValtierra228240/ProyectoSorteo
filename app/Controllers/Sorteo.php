<?php

namespace App\Controllers;
use App\Models\SorteoModel;

class Sorteo extends BaseController
{

    private $sorteoModel;
    
    function __construct() {
        $this->sorteoModel = new SorteoModel();
    }

    public function index()
    {

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
            $sorteos = $this->sorteoModel->findAll();
    
            $data = [
                "usuario" => $usuario,
                "sorteos" => $sorteos
            ];
            
            return view('sorteo/index', $data);
        }
        
        else {
            header("location: /Login");
            exit();
        }
    }
}
