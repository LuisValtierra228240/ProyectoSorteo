<?php

namespace App\Controllers;
use App\Models\BoletoModel;
use App\Models\SorteoModel;

class Boleto extends BaseController
{
    private $boletoModel;
    private $sorteoModel;

    function __construct() 
    {
        $this->boletoModel = new BoletoModel();
        $this->sorteoModel = new SorteoModel();
    }
    
    public function Index($id = 0)
    {
        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"],
                "id" => $_SESSION["id"]
            ];
            if ($id == 0){
                $boletos = $this->boletoModel->obtenerTodos();
            }else{
                $boletos = $this->boletoModel->obtenerPorSorteo($id);
            }
    
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

    public function create($id_sorteo)
    {

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"],
                "id" => $_SESSION["id"]
            ];
            $sorteo = $this->sorteoModel->find($id_sorteo);
            $boletos = $this->boletoModel->obtenerPorSorteo($id_sorteo);
    
            $data = [
                "usuario" => $usuario,
                "sorteo" => $sorteo,
                "boletos" => $boletos
            ];
            
            return view("/boleto/create", $data);

        } else {
            header("location: /Login");
            exit();
            }
    }

    public function store()
    {
        $boleto = [
            "numero_boleto"=> $this->request->getPost('numero_boleto'),
            "id_sorteo"=> $this->request->getPost('id_sorteo'),
            "estado_pago"=> $this->request->getPost('estado_pago'),
            "fecha_compra"=> $this->request->getPost('fecha_compra'),
            "id_usuario"=> $this->request->getPost('id_usuario')
        ];

            $this->boletoModel->crear($boleto["numero_boleto"], $boleto["id_sorteo"], $boleto["estado_pago"] , $boleto["fecha_compra"] , $boleto["id_usuario"]);

        return redirect()->to("/boleto/index/".$boleto["id_sorteo"]);
    }

    public function edit($id)
    {

        session_start();

        if (isset($_SESSION["nombre_completo"])) {
            $usuario = [
                "nombre" => $_SESSION["nombre_completo"],
                "id" => $_SESSION["id"]
            ];
            $boleto = $this->boletoModel->obtenerPorId($id);
            $boletos = $this->boletoModel->obtenerPorSorteo($boleto->sorteo_id);
    
            $data = [
                "usuario" => $usuario,
                "boletos" => $boletos,
                "boleto" => $boleto
            ];
            
            return view("/boleto/edit", $data);

        } else {
            header("location: /Login");
            exit();
            }
    }

    public function update($id)
    {
        $boleto = [
            "numero_boleto"=> $this->request->getPost('numero_boleto'),
            "id_sorteo"=> $this->request->getPost('id_sorteo'),
            "estado_pago"=> $this->request->getPost('estado_pago'),
            "fecha_compra"=> $this->request->getPost('fecha_compra'),
            "id_usuario"=> $this->request->getPost('id_usuario')
        ];

            $this->boletoModel->actualizar($id , $boleto["numero_boleto"], $boleto["id_sorteo"], $boleto["estado_pago"] , $boleto["fecha_compra"] , $boleto["id_usuario"]);

        return redirect()->to("/boleto/index/".$boleto["id_sorteo"]);
    }

    public function Comprar($id_sorteo, $id_usuario) {
        $this->boletoModel->crear($id_sorteo, $id_usuario, date("y/m/d"));
        header("location: /boleto");
        exit();
    }
}