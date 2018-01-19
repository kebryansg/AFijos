<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Departamento.php';
class DepartamentoDaoImp {
    public static function save($departamento) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($departamento->ID == 0) {
            $sql = $departamento->Insert();
        } else {
            $sql = $departamento->Update();
        }
        if ($conn->query($sql)) {
            if ($departamento->ID == 0) {
                $departamento->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listDepartamento($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from departamento $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($departamento) {
        $conn = (new C_MySQL())->open();
        $sql = $departamento->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
