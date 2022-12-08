<?php
namespace App\Models;
use CodeIgniter\Model;

class BoletoModel extends Model
{

    public function valores()
    {

    }

    public function obtenerTodos()
    {
        $db = db_connect();
        $query = $db->query('SELECT participante.id AS id_boleto, participante.numero_boleto AS numero_boleto, participante.estado_pago AS estado_pago, participante.fecha_compra AS fecha_compra_b, sorteo.id AS sorteo_id, sorteo.nombre AS nombre_sorteo,sorteo.fechaSorteo AS fecha_sorteo, sorteo.precioBoleto AS precio_boleto, sorteo.premio AS premio_sorteo, sorteo.cantidadBoletos AS cantidad_boletos_sorteo, usuarios2.nombre_completo AS nombre_usuario, usuarios2.id AS id_usuario FROM sql9583025.participante INNER JOIN sorteo ON sorteo.id=participante.id_sorteo INNER JOIN usuarios2 on participante.id_usuario=usuarios2.id;');

        $boletos = [];
        foreach ($query->getResult() as $row) {
            array_push($boletos, $row);

        }

        return $boletos;
    }

    public function obtenerPorId($id)
    {
        $db = db_connect();
        $query = $db->query("SELECT participante.id AS id_boleto, participante.numero_boleto AS numero_boleto, participante.estado_pago AS estado_pago, participante.fecha_compra AS fecha_compra_b, sorteo.id AS sorteo_id, sorteo.nombre AS nombre_sorteo,sorteo.fechaSorteo AS fecha_sorteo, sorteo.precioBoleto AS precio_boleto, sorteo.premio AS premio_sorteo, sorteo.cantidadBoletos AS cantidad_boletos_sorteo, usuarios2.nombre_completo AS nombre_usuario, usuarios2.id AS id_usuario FROM sql9583025.participante INNER JOIN sorteo ON sorteo.id=participante.id_sorteo INNER JOIN usuarios2 on participante.id_usuario=usuarios2.id WHERE participante.id = $id;");

        foreach ($query->getResult() as $row) {
            $boleto = $row;
        }

        return $boleto;
    }

    public function obtenerPorSorteo($id)
    {
        $db = db_connect();
        $query = $db->query("SELECT participante.id AS id_boleto, participante.numero_boleto AS numero_boleto, participante.estado_pago AS estado_pago, participante.fecha_compra AS fecha_compra_b, sorteo.id AS sorteo_id, sorteo.nombre AS nombre_sorteo,sorteo.fechaSorteo AS fecha_sorteo, sorteo.precioBoleto AS precio_boleto, sorteo.premio AS premio_sorteo, sorteo.cantidadBoletos AS cantidad_boletos_sorteo, usuarios2.nombre_completo AS nombre_usuario, usuarios2.id AS id_usuario FROM sql9583025.participante INNER JOIN sorteo ON sorteo.id=participante.id_sorteo INNER JOIN usuarios2 on participante.id_usuario=usuarios2.id where sorteo.id = $id;");

        $boletos = [];
        foreach ($query->getResult() as $row) {
            array_push($boletos, $row);

        }

        return $boletos;
    }

    public function crear($numero_boleto, $id_sorteo, $estado_pago, $fecha_compra, $id_usuario) {
        $db = db_connect();
        $query = $db->query("INSERT INTO participante (numero_boleto, id_sorteo, estado_pago, fecha_compra, id_usuario) VALUES($numero_boleto, $id_sorteo, '$estado_pago', null, $id_usuario)");
    }

    public function actualizar($id, $numero_boleto, $id_sorteo, $estado_pago, $fecha_compra, $id_usuario) {
        $db = db_connect();
        $query = $db->query("UPDATE participante SET numero_boleto = $numero_boleto, id_sorteo = $id_sorteo, estado_pago = '$estado_pago', id_usuario = $id_usuario WHERE id = $id");
    }
    
    /* public function crear($id_sorteo, $id_usuario, $fecha_compra) {
        srand (time());
        $numero_aleatorio = rand(1,20000);
        $db = db_connect();
        $query = $db->query("INSERT INTO participante (numero_boleto, id_sorteo, estado_pago, fecha_compra, id_usuario) VALUES($numero_aleatorio, $id_sorteo, 'PAGADO', $fecha_compra, $id_usuario)");
        echo "Creado bo";
    } */
}