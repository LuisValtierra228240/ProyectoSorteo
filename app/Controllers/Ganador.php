<?php

namespace App\Controllers;
use App\Models\SorteoModel;
use App\Models\UsuarioModel;
use App\Models\BoletoModel;

class Ganador extends BaseController
{

    private $sorteoModel;
    private $usuarioModel;
    private $boletoModel;
    
    function __construct() {
        $this->sorteoModel = new SorteoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->boletoModel = new BoletoModel();

    }

    public function index()
    {

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"],
                "id" => $_SESSION["id"]
            ];
            
                $sorteos = $this->sorteoModel->findWinners();
        
            $data = [
                "usuario" => $usuario,
                "sorteos" => $sorteos
            ];
            
            return view('ganador/index', $data);
        }
        
        else {
            header("location: /Login");
            exit();
        }
    }

    public function create($id) 
    {
        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"],
                "id" => $_SESSION["id"]
            ];
            $sorteo = $this->sorteoModel->find($id);
            $usuarios = $this->usuarioModel->findAll();
            $boletos = $this->boletoModel->obtenerPorSorteo($id);

            $data = [
                "sorteo" => $sorteo,
                "usuarios" => $usuarios,
                "usuario" => $usuario,
                "boletos" => $boletos
                    ];

            return view("/ganador/create", $data);

        } else {
            header("location: /Login");
            exit();
               }
    }

    public function store($id)
    {
        $sorteo = [
            "idGanador"=> $this->request->getPost('idGanador'),
        ];

        $this->sorteoModel ->update($id, $sorteo);
        return redirect()->to("/sorteo");
    }
}
