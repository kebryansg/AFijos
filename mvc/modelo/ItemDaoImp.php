<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Item.php';
class ItemDaoImp {
     public static function save($item) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($item->ID == 0) {
            $sql = $item->Insert();
        } else {
            $sql = $item->Update();
        }
        if ($conn->query($sql)) {
            if ($item->ID == 0) {
                $item->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listItem($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from items $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($item) {
        $conn = (new C_MySQL())->open();
        $sql = $item->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
