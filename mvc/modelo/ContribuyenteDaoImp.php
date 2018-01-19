<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Contribuyente.php';

class ContribuyenteDaoImp {
    public static function save($contribuyente) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($contribuyente->ID == 0) {
            $sql = $contribuyente->Insert();
        } else {
            $sql = $contribuyente->Update();
        }
        if ($conn->query($sql)) {
            if ($contribuyente->ID == 0) {
                $contribuyente->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listContribuyente($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, estado from contribuyente $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($contribuyente) {
        $conn = (new C_MySQL())->open();
        $sql = $contribuyente->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
