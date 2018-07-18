<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/Entidades/DetalleOrdenPedido.php';

class DetalleOrdenPedidoDaoImp extends ModelProcedure {

    public static function listDetalleOrdenPedido($params) {
        $conn = (new C_MySQL())->open();
        //$sql = "select * from view_detalleop_aprobadas;";
        $param = array(
            "procedure" => "sp_DetOPedido",
            "params" => json_encode($params)
        );

        $list = C_MySQL::returnListAsoc_Total($conn,$param);
        $conn->close();
        return $list;
    }

    public static function _list($IDOPedido) {
        $conn = (new C_MySQL())->open();
        $sql = "select * from DetalleOrdenPedido where idordenpedido =  $IDOPedido ;";
        //$sql = "select * from view_detalleop_aprobadas;";
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

    public function deleteOrdenPedido($DetalleOrdenPedido, $IdDetalleOrdenPedido) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from " . $DetalleOrdenPedido->tabla . " where id in (" . join(',', $IdDetalleOrdenPedido) . ")";
        $conn->query($sql);
        $conn->close();
    }

}
