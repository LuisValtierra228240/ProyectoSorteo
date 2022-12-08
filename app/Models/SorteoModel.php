<?php
namespace App\Models;
use CodeIgniter\Model;

class SorteoModel extends Model
{
    protected $table = 'sorteo';

    protected $primarykey = 'id';

    protected $allowedFields = [
        'nombre',
        'idGanador',
        'fechaSorteo',
        'fechaCreacion',
        'precioBoleto',
        'premio',
        'descripcion',
        'idCreador',
        'imagen',
        'cantidadBoletos'
    ];

    public function findAllJoins(){
        $select = "$this->table.*, ganador.nombre_completo AS nombreGanador, 
        ganador.correo AS ganadorCorreo, ganador.contrasena AS ganadorContrasena, 
        creador.nombre_completo AS nombreCreador, creador.correo AS creadorCorreo, 
        creador.contrasena AS creadorContrasena";

        return $this->asArray()->select($select)->
        join('usuarios2 as ganador', 'ganador.id = sorteo.idGanador', 'left')->
        join('usuarios2 as creador', 'creador.id = sorteo.idCreador', 'left')->
        findAll();
    }

    public function findJoins($id){
        $select = "$this->table.*, ganador.nombre_completo AS nombreGanador, 
        ganador.correo AS ganadorCorreo, ganador.contrasena AS ganadorContrasena, 
        creador.nombre_completo AS nombreCreador, creador.correo AS creadorCorreo, 
        creador.contrasena AS creadorContrasena";

        return $this->asArray()->select($select)->
        join('usuarios2 as ganador', 'ganador.id = sorteo.idGanador', 'left')->
        join('usuarios2 as creador', 'creador.id = sorteo.idCreador', 'left')->
        find($id);
    }

    public function findWinners(){
        $select = "$this->table.*, ganador.nombre_completo AS nombreGanador, 
        ganador.correo AS ganadorCorreo, ganador.contrasena AS ganadorContrasena, 
        creador.nombre_completo AS nombreCreador, creador.correo AS creadorCorreo, 
        creador.contrasena AS creadorContrasena";

        return $this->asArray()->select($select)->
        join('usuarios2 as ganador', 'ganador.id = sorteo.idGanador', 'inner')->
        join('usuarios2 as creador', 'creador.id = sorteo.idCreador', 'left')->
        findAll();
    }

}