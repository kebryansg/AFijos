<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Ubicacion.php';

class UbicacionDaoImp extends ModelProcedure {

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

}
