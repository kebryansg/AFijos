<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/Entidades/OrdenPedido.php';

class OrdenPedidoDaoImp extends ModelProcedure {

//    public static function save($OrdenPedido) {
//        $conn = (new C_MySQL())->open();
//        $sql = "";
//        if ($OrdenPedido->ID == 0) {
//            $sql = $OrdenPedido->Insert();
//        } else {
//            $sql = $OrdenPedido->Update();
//        }
//        if ($conn->query($sql)) {
//            if ($OrdenPedido->ID == 0) {
//                $OrdenPedido->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }
    public static function get($id) {
        $conn = (new C_MySQL())->open();
        $sql = "select * from viewOrdenPedido where id = $id ;";

        $return = C_MySQL::returnListAsoc($conn, $sql)[0];
        $conn->close();
        return $return;
    }
    public static function getEncabezado($id) {
        $conn = (new C_MySQL())->open();
        $sql = "call sp_getEncabezadoPedido($id);";
        $return = C_MySQL::returnRowAsoc($conn, $sql);
        $conn->close();
        return $return;
    }

    public static function listOrdenPedido($params) {
        $conn = (new C_MySQL())->open();
        $params = array(
            "procedure" => "sp_GetOPedidos",
            "params" => json_encode($params)
        );
        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }
    public static function listAprobacionOrdenPedido($params) {
        $conn = (new C_MySQL())->open();
        $params = array(
            "procedure" => "sp_GetAprobacionOPedidos",
            "params" => json_encode($params)
        );
        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }

//    public function delete($OrdenPedido) {
//        $conn = (new C_MySQL())->open();
//        $sql = $OrdenPedido->Update_Delete();
//        $conn->query($sql);
//        $conn->close();
//    }

    public function aprobacionPedido($OrdenPedido) {
        $conn = (new C_MySQL())->open();
        $sql = "Update " . $OrdenPedido->tabla . " set detalleAutorizacion =  '". $OrdenPedido->DetalleAutorizacion ."' , observacion = '" . $OrdenPedido->Observacion . "', estado = '" . $OrdenPedido->Estado . "' where id = " . $OrdenPedido->ID;
        $bandera = $conn->query($sql);
        $conn->close();
        return $bandera;
    }

}
