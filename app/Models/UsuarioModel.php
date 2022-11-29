<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios2';

    protected $primarykey = 'id';

    protected $allowedFields = [
        'nombre_completo',
        'correo',
        'contrasena'
    ];

    public function filtro($id, $nombre_completo, $correo, $contrasena) {
        $where = [];

        if(!empty($id) and $id != 0) {
            $where["id"] = $id;
        }

        if(!empty($nombre_completo) and $nombre_completo != 0) {
            $where["nombre_completo"] = $nombre_completo;
        }

        if(!empty($correo) and $correo != 0) {
            $where["correo"] = $correo;
        }
        if(!empty($contrasena) and $contrasena != 0) {
            $where["contrasena"] = $contrasena;
        }
        
       return $this->asArray()->where($where)->findAll();
    }
}