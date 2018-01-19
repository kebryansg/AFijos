<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Edificio.php';

class EdificioDaoImp {
    public static function save($edificio) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($edificio->ID == 0) {
            $sql = $edificio->Insert();
        } else {
            $sql = $edificio->Update();
        }
        if ($conn->query($sql)) {
            if ($edificio->ID == 0) {
                $edificio->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listEdificio($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $sql = "select SQL_CALC_FOUND_ROWS * from viewedificio $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($edificio) {
        $conn = (new C_MySQL())->open();
        $sql = $edificio->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
