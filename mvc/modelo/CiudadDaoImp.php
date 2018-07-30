<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Ciudad.php';

class CiudadDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $params = array(
            "procedure" => "sp_GetCiudad",
            "params" => json_encode($params)
        );
        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }
    public static function listCiudadPais() {
        $conn = (new C_MySQL())->open();
        $sql = "select SQL_CALC_FOUND_ROWS * from viewciudad_pais ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

    
}
