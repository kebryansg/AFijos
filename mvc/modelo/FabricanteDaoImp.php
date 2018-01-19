<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Fabricante.php';

class FabricanteDaoImp {

    public static function save($fabricante) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($fabricante->ID == 0) {
            $sql = $fabricante->Insert();
        } else {
            $sql = $fabricante->Update();
        }
        if ($conn->query($sql)) {
            if ($fabricante->ID == 0) {
                $fabricante->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listFabricante($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewfabricante $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($fabricante) {
        $conn = (new C_MySQL())->open();
        $sql = $fabricante->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}
