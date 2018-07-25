<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Cotizacion.php';
include_once 'ModelProcedure.php';

class CotizacionDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $param = array(
            "procedure" => "sp_GetCotizacion",
            "params" => json_encode($params)
        );
        $list = C_MySQL::returnListAsoc_Total($conn, $param);
        $conn->close();
        return $list;
    }

}
