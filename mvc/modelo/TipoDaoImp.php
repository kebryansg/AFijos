<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Tipo.php';

class TipoDaoImp {
    public static function save($tipo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($tipo->ID == 0) {
            $sql = $tipo->Insert();
        } else {
            $sql = $tipo->Update();
        }
        if ($conn->query($sql)) {
            if ($tipo->ID == 0) {
                $tipo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listTipo($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID, descripcion, observacion, estado, vidautil, depreciable from tipo $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($tipo) {
        $conn = (new C_MySQL())->open();
        $sql = $tipo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
