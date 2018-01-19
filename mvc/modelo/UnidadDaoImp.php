<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Unidad.php';

class UnidadDaoImp {
    public static function save($unidad) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($unidad->ID == 0) {
            $sql = $unidad->Insert();
        } else {
            $sql = $unidad->Update();
        }
        if ($conn->query($sql)) {
            if ($unidad->ID == 0) {
                $unidad->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listUnidad($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion,abreviacion,observacion,estado from unidad $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($unidad) {
        $conn = (new C_MySQL())->open();
        $sql = $unidad->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}
