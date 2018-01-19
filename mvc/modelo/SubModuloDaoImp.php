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

    public static function listSubModulo($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewsubmodulo $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($submodulo) {
        $conn = (new C_MySQL())->open();
        $sql = $submodulo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
