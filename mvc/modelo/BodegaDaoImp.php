<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Bodega.php';

class BodegaDaoImp {
    public static function save($bodega) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($bodega->ID == 0) {
            $sql = $bodega->Insert();
        } else {
            $sql = $bodega->Update();
        }
        if ($conn->query($sql)) {
            if ($bodega->ID == 0) {
                $bodega->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listBodega($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from bodega $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($bodega) {
        $conn = (new C_MySQL())->open();
        $sql = $bodega->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
