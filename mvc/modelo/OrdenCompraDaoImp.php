<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/Entidades/OrdenCompra.php';

class OrdenCompraDaoImp extends ModelProcedure {

//    public static function save($orden) {
//        $conn = (new C_MySQL())->open();
//        $sql = ($orden->ID == 0) ? $orden->Insert() : $orden->Update();
//        if ($conn->query($sql)) {
//            if ($orden->ID == 0) {
//                $orden->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }

    public static function listOrdenCompra($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from OrdenCompra $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

//    public function delete($orden) {
//        $conn = (new C_MySQL())->open();
//        $sql = $orden->Update_Delete();
//        $conn->query($sql);
//        $conn->close();
//    }

}
