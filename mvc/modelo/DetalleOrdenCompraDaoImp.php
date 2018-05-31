<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/DetalleOrdenCompra.php';
include_once 'ModelProcedure.php';
class DetalleOrdenCompraDaoImp extends ModelProcedure {
//    public static function save($detalle) {
//        $conn = (new C_MySQL())->open();
//        $sql = ($detalle->ID == 0) ? $detalle->Insert() : $detalle->Update();
//        if ($conn->query($sql)) {
//            if ($detalle->ID == 0) {
//                $detalle->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }

    public static function listDetalleOrdenCompra($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from DetalleOrdenCompra $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    
    public static function listDetalleOrdenCompra_Proveedor($proveedor) {
        $conn = (new C_MySQL())->open();
        $sql = "call ProveedorDetalleOrdenCompra($proveedor);";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

//    public function delete($detalle) {
//        $conn = (new C_MySQL())->open();
//        $sql = $detalle->Update_Delete();
//        $conn->query($sql);
//        $conn->close();
//    }
}
