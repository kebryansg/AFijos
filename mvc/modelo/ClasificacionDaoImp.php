<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Clasificacion.php';

class ClasificacionDaoImp {

    public static function save($clasificacion) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($clasificacion->ID == 0) {
            $sql = $clasificacion->Insert();
        } else {
            $sql = $clasificacion->Update();
        }
        if ($conn->query($sql)) {
            if ($clasificacion->ID == 0) {
                $clasificacion->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listClasificacion($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from clasificacion $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($clasificacion) {
        $conn = (new C_MySQL())->open();
        $sql = $clasificacion->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}
