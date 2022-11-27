<?php
namespace App\Models;
use CodeIgniter\Model;

class VideojuegoModel extends Model
{
    protected $table = 'videojuegos';

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