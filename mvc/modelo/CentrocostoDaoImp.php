<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Centrocosto.php';

class CentrocostoDaoImp {

    public static function save($centrocosto) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($centrocosto->ID == 0) {
            $sql = $centrocosto->Insert();
        } else {
            $sql = $centrocosto->Update();
        }
        if ($conn->query($sql)) {
            if ($centrocosto->ID == 0) {
                $centrocosto->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listCentro($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion,abreviacion,observacion,estado from centrocosto $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($centrocosto) {
        $conn = (new C_MySQL())->open();
        $sql = $centrocosto->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}
