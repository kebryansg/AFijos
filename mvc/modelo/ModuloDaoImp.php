<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Modulo.php';

class ModuloDaoImp {
    public static function save($modulo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($modulo->ID == 0) {
            $sql = $modulo->Insert();
        } else {
            $sql = $modulo->Update();
        }
        if ($conn->query($sql)) {
            if ($modulo->ID == 0) {
                $modulo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listModulo($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from modulo $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($modulo) {
        $conn = (new C_MySQL())->open();
        $sql = $modulo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
