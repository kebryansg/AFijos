<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Proveedor.php';

class ProveedorDaoImp {
    public static function save($proveedor) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($proveedor->ID == 0) {
            $sql = $proveedor->Insert();
        } else {
            $sql = $proveedor->Update();
        }
        if ($conn->query($sql)) {
            if ($proveedor->ID == 0) {
                $proveedor->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    public static function listProveedor($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from Proveedor $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($proveedor) {
        $conn = (new C_MySQL())->open();
        $sql = $proveedor->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
