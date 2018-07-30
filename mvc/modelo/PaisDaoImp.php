<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Pais.php';

class PaisDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $pagination = ($params["limit"] !== 0) ? "LIMIT " . $params["limit"] . " OFFSET " . $params["offset"] : "";
        $params = array(
            "sql" => "select SQL_CALC_FOUND_ROWS * from pais where descripcion like CONCAT('%','" . $params["buscar"] . "','%') $pagination;",
            "params" => json_encode($params)
        );
        $list = C_MySQL::queryListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }

}
