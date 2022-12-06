<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Request;

class Recuperacion extends BaseController 
{
    private $usuarioModel; 
    

    function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index() {
        return view("recuperacion/index");
    }

    public function cambiar() {
        if (isset($_POST["correo"]) && isset($_POST["contra_actual"]) && isset($_POST["nueva_contra"]) ) {
            $correo = $_POST["correo"];
            $contra_actual = $_POST["contra_actual"];
            $contra_nueva = $_POST["nueva_contra"];

            $usuarios = $this->usuarioModel->filtro(0, "", $correo, $contra_actual);
            if ($usuarios !== null) {
                if (isset($usuarios[0])) {//En caso de que se encuentre un resultado con las credenciales proporcionadas
                    $values = ['contrasena' => $contra_nueva];
                    $this->usuarioModel->update($usuarios[0]["id"], $values);
                    header("location:" . base_url() . "/login");
                    exit(0);
                } else {
                    echo "Credenciales incorrectas";
                }
            } else {
                echo "Credenciaes incorrectas";
            }
        }
    }
}