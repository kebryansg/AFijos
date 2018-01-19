<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Ciudad.php';
class CiudadDaoImp {
    public static function save($ciudad) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($ciudad->ID == 0) {
            $sql = $ciudad->Insert();
        } else {
            $sql = $ciudad->Update();
        }
        if ($conn->query($sql)) {
            if ($ciudad->ID == 0) {
                $ciudad->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listCiudad($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewciudad $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($ciudad) {
        $conn = (new C_MySQL())->open();
        $sql = $ciudad->Update_Delete() ;
        $conn->query($sql);
        $conn->close();
    }
}
