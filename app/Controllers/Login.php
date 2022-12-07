<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Request;

class Login extends BaseController 
{
    private $usuarioModel; 
    

    function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }
    public function index() 
    {
        return view("login/index");
    }

    public function validar() {
        if ($this->usuarioModel) {
            if (isset($_POST["correo"]) && isset($_POST["contra"]) ) {
                $correo = $_POST["correo"];
                $contra = $_POST["contra"];
                
                $usuarios = $this->usuarioModel->filtro(0, "", $correo, $contra);
                if ($usuarios !== null) {
                    if (isset($usuarios[0])) { //En caso de que se encuentre un resultado con las credenciales proporcionadas
                    
                        session_start();
                        $nombre = $usuarios[0]["nombre_completo"];
                        
                        $_SESSION["id"] = $usuarios[0]["id"];
                        $_SESSION["correo"] = $correo;
                        $_SESSION["contra"] = $contra;
                        $_SESSION["nombre_completo"] = $nombre;
                        echo "Credenciales correctas";
                        header("Location: /");
                        exit();
                    } else {
                        echo "Credenciaes incorrectas";
                    }
                }



            } else {
                echo "Rellene todos los campos";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /Login");
        exit();
    }
}