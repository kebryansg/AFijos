<?php

//include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Departamento.php';

class DepartamentoDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["top"] > 0 ) ? "limit {$params["top"]} offset {$params["pag"]}" : "";
        
        $param = array(
            "sql" => "select SQL_CALC_FOUND_ROWS * from departamento $banderapag ;"
        );

        $list = C_MySQL::queryListAsoc_Total($conn, $param);
        $conn->close();
        return $list;
    }

}
