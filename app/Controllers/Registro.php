<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Registro extends BaseController 
{
    public function index() 
    {
        return view("registro/index");
    }

    public function registrar() 
    {
        //Si se recibieron todos los campos
        if ( isset($_POST["correo"]) && isset($_POST["contra"])  && isset($_POST["nombre_completo"])) {
            $correo = $_POST["correo"];
            $contra = $_POST["contra"];
            $nombre = $_POST["nombre_completo"];
            $nombre = $_POST["nombre_completo"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $url_imagen = $_POST["url_imagen"];
            
            $usuarioModel = new UsuarioModel();
            
            //Validar que se no encuentre un usuario registrado con el mismo correo
            $usuarios = $usuarioModel->filtro(0, "", $correo, "");
            if (!isset($usuarios[0] ) ) {
                $nuevoUsuario = ["correo" => $correo, "contrasena" => $contra, "nombre_completo" => $nombre, 
                                 "telefono" => $telefono, "direccion" => $direccion, "foto_url" => $url_imagen];
                if ($usuarioModel->save($nuevoUsuario)) {
                    echo "Guardado correctamente";
                    header("Location: /Login");
                    exit();
                } else {
                    echo "Error al guardar";
                }
            } else {
                echo "El correo ya esta siendo utilizado";
            }
        }
    }
}