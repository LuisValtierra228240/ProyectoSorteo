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
}