<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Presupuesto.php';
include_once 'ModelProcedure.php';

class PresupuestoDaoImp extends ModelProcedure {

//    public static function save($presupuesto) {
//        $conn = (new C_MySQL())->open();
//        $sql = "";
//        if ($presupuesto->ID == 0) {
//            $sql = $presupuesto->Insert();
//        } else {
//            $sql = $presupuesto->Update();
//        }
//        if ($conn->query($sql)) {
//            if ($presupuesto->ID == 0) {
//                $presupuesto->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }

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

    public static function get($params) {
        $conn = (new C_MySQL())->open();
        $sql = "SELECT * from presupuesto where año = '" . $params["fecha"] . "' and iddepartamento = '" . $params["departamento"] . "'";
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

//    public static function delete($presupuesto) {
//        $conn = (new C_MySQL())->open();
//        $sql = $presupuesto->Update_Delete();
//        $conn->query($sql);
//        $conn->close();
//    }

}
