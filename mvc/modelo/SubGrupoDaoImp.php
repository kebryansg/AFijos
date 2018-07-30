<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/SubGrupo.php';

class SubGrupoDaoImp extends ModelProcedure {

    public static function listSubGrupo($params) {
        $conn = (new C_MySQL())->open();
        //$banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        $where = ($params["buscar"] != NULL) ? " where descripcion like '%" . $params["buscar"] . "%' or grupo like '%" . $params["buscar"] . "%' " : "";

        $sql = "select SQL_CALC_FOUND_ROWS * from viewSubGrupo $where $banderapag ;";

        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );

        $conn->close();
        return $dts;
    }

    public static function listSubGrupoxGrupo($idGrupo) {
        $conn = (new C_MySQL())->open();
        $sql = "select * from subgrupo where idgrupo = $idGrupo ;";
        $dts = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $dts;
    }

}
