<?php
namespace App\Models;
use CodeIgniter\Model;

class SocioModel extends Model
{
    protected $table = 'socios';

    protected $primarykey = 'id';

    protected $allowedFields = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono',
        'direccion',
        'email'
    ];
}