<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/TipoMovimiento.php';
include_once 'ModelProcedure.php';

class TipoMovimientoDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        //where estado = 'ACT'
        $where = ($params["buscar"] != NULL) ? " where descripcion like '%" . $params["buscar"] . "%' " : "";
        $sql = "select SQL_CALC_FOUND_ROWS * from TipoMovimiento $where $banderapag ;";
        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );

        $conn->close();
        return $dts;
    }
    
    public static function asignarUsuario($usuario, $TipoMovimientos) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from tipomovimientousuario where idusuario = $usuario;";
        $conn->query($sql);
        $sql = "insert into tipomovimientousuario(idtipomovimiento, idusuario) values";
        if (count($TipoMovimientos) > 0) {
            $list = array();
            foreach ($TipoMovimientos as $TipoMovimiento) {
                array_push($list, "(" . $TipoMovimiento . "," . $usuario . ")");
            }
            $sql .= join(',', $list);
            $conn->query($sql);
        }
        $conn->close();
    }

}

