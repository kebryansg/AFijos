<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Submodulo.php';
class SubModuloDaoImp {
    public static function save($submodulo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($submodulo->ID == 0) {
            $sql = $submodulo->Insert();
        } else {
            $sql = $submodulo->Update();
        }
        if ($conn->query($sql)) {
            if ($submodulo->ID == 0) {
                $submodulo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listSubModulo($params) {
        $conn = (new C_MySQL())->open();
        //$banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        $where = ($params["buscar"] != NULL) ? " where descripcion like '%" . $params["buscar"] . "%' or modulo like '%" . $params["buscar"] . "%' " : "";
        
        $sql = "select SQL_CALC_FOUND_ROWS * from viewsubmodulo $where $banderapag ;";
        
        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );
        $conn->close();
        return $dts;
    }

    public function delete($submodulo) {
        $conn = (new C_MySQL())->open();
        $sql = $submodulo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
