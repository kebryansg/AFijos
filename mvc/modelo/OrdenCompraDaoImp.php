<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/Entidades/OrdenCompra.php';

class OrdenCompraDaoImp extends ModelProcedure {


    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $params = array(
            "procedure" => "sp_GetOCompras",
            "params" => json_encode($params)
        );
        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        

        $conn->close();
        return $list;
    }
}
