<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Area.php';

class AreaDaoImp {
    public static function save($area) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($area->ID == 0) {
            $sql = $area->Insert();
        } else {
            $sql = $area->Update();
        }
        if ($conn->query($sql)) {
            if ($area->ID == 0) {
                $area->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listArea($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewarea $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($area) {
        $conn = (new C_MySQL())->open();
        $sql = $area->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
