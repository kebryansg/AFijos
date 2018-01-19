<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/SubClase.php';
class SubClaseDaoImp {
    public static function save($subClase) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($subClase->ID == 0) {
            $sql = $subClase->Insert();
        } else {
            $sql = $subClase->Update();
        }
        if ($conn->query($sql)) {
            if ($subClase->ID == 0) {
                $subClase->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    
    public static function listSubClase($top, $pag, &$count){
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $sql = "select SQL_CALC_FOUND_ROWS * from viewsubclase $banderapag ;";
        
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    public function delete($subClase) {
        $conn = (new C_MySQL())->open();
        $sql = $subClase->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
    
}
