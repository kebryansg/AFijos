<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Ubicacion.php';
class UbicacionDaoImp {
    public static function save($ubicacion) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($ubicacion->ID == 0) {
            $sql = $ubicacion->Insert();
        } else {
            $sql = $ubicacion->Update();
        }
        if ($conn->query($sql)) {
            if ($ubicacion->ID == 0) {
                $ubicacion->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listUbicacion($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewubicacion $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($ubicacion) {
        $conn = (new C_MySQL())->open();
        $sql = $ubicacion->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
