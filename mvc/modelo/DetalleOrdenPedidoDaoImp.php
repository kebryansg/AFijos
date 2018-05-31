<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/Entidades/DetalleOrdenPedido.php';

class DetalleOrdenPedidoDaoImp extends ModelProcedure{

//    public static function save($detalleOrdenPedido) {
//        $conn = (new C_MySQL())->open();
//        $sql = "";
//        if ($detalleOrdenPedido->ID == 0) {
//            $sql = $detalleOrdenPedido->Insert();
//        } else {
//            $sql = $detalleOrdenPedido->Update();
//        }
//        if ($conn->query($sql)) {
//            if ($detalleOrdenPedido->ID == 0) {
//                $detalleOrdenPedido->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }

    public static function listDetalleOrdenPedido() {
        $conn = (new C_MySQL())->open();
        //$sql = "select SQL_CALC_FOUND_ROWS * from DetalleOrdenPedido where idordenpedido =  $IDOrdenPedido ;";
        $sql = "select * from view_detalleop_aprobadas;";
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

    public function delete($detalleOrdenPedido) {
        $conn = (new C_MySQL())->open();
        //$sql = $detalleOrdenPedido->Update_Delete();
        $sql = "Delete from " . $detalleOrdenPedido->tabla . " where id = " . $detalleOrdenPedido->ID;
        $conn->query($sql);
        $conn->close();
    }

    public function deleteOrdenPedido($DetalleOrdenPedido, $IdDetalleOrdenPedido) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from " . $DetalleOrdenPedido->tabla . " where id in (" . join(',', $IdDetalleOrdenPedido) . ")";
        $conn->query($sql);
        $conn->close();
    }

}
