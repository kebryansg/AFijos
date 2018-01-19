<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Presupuesto.php';

class PresupuestoDaoImp {
    public static function save($presupuesto) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($presupuesto->ID == 0) {
            $sql = $presupuesto->Insert();
        } else {
            $sql = $presupuesto->Update();
        }
        if ($conn->query($sql)) {
            if ($presupuesto->ID == 0) {
                $presupuesto->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listPresupuesto($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from presupuesto $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($presupuesto) {
        $conn = (new C_MySQL())->open();
        $sql = $presupuesto->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
