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

    public function create()
    {

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
            $sorteos = $this->sorteoModel->findAll();
    
            $data = [
                "usuario" => $usuario
            ];
            
            return view("/sorteo/create", $data);

        } else {
            header("location: /Login");
            exit();
            }
    }

    public function store()
    {
        $sorteo = [
            "nombre"=> $this->request->getPost('nombre'),
            "idGanador"=> $this->request->getPost('idGanador'),
            "fechaSorteo"=> $this->request->getPost('fechaSorteo'),
            "fechaCreacion"=> $this->request->getPost('fechaCreacion'),
            "precioBoleto"=> $this->request->getPost('precioBoleto'),
            "premio"=> $this->request->getPost('premio'),
            "descripcion"=> $this->request->getPost('descripcion'),
            "idCreador"=> $this->request->getPost('idCreador'),
            "imagen"=> $this->request->getPost('imagen'),
            "cantidadBoletos"=> $this->request->getPost('cantidadBoletos')
        ];

        $data = [
            "sorteo" => $sorteo
                ];

            $this->sorteoModel->insert($sorteo);

        return redirect()->to("/sorteo");
    }

    public function edit($id) 
    {
        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"]
            ];
            $sorteo = $this->sorteoModel->find($id);

            $data = [
                "sorteo" => $sorteo,
                "usuario" => $usuario
                    ];

            return view("/sorteo/edit", $data);

        } else {
            header("location: /Login");
            exit();
               }
    }

    public function update($id)
    {
        $sorteo = [
            "nombre"=> $this->request->getPost('nombre'),
            "idGanador"=> $this->request->getPost('idGanador'),
            "fechaSorteo"=> $this->request->getPost('fechaSorteo'),
            "fechaCreacion"=> $this->request->getPost('fechaCreacion'),
            "precioBoleto"=> $this->request->getPost('precioBoleto'),
            "premio"=> $this->request->getPost('premio'),
            "descripcion"=> $this->request->getPost('descripcion'),
            "idCreador"=> $this->request->getPost('idCreador'),
            "imagen"=> $this->request->getPost('imagen'),
            "cantidadBoletos"=> $this->request->getPost('cantidadBoletos')
        ];

        $this->sorteoModel ->update($id, $sorteo);
        return redirect()->to("/sorteo");

    }

    public function delete($id)
    {
        $this->sorteoModel->delete($id);
        return redirect()->to("/sorteo");
    }
}
