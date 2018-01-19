<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Pais.php';

class PaisDaoImp {
    public static function save($pais) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($pais->ID == 0) {
            $sql = $pais->Insert();
        } else {
            $sql = $pais->Update();
        }
        if ($conn->query($sql)) {
            if ($pais->ID == 0) {
                $pais->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listPais($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion,observacion,estado from pais $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($pais) {
        $conn = (new C_MySQL())->open();
        $sql = $pais->Update_Delete() ;
        $conn->query($sql);
        $conn->close();
    }
}
