<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Clase.php';
class ClaseDaoImp {
    public static function save($clase){
        $conn = (new C_MySQL())->open();
        $sql = "";
        if($clase->ID == 0){
            $sql = $clase->Insert();
        }else{
            $sql = $clase->Update();
        }
        if($conn->query($sql)){
            if($clase->ID == 0){
                $clase->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    public static function listClase($top, $pag, &$count){
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion,observacion,estado from clase $banderapag ;";
        
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    public function delete($clase) {
        $conn = (new C_MySQL())->open();
        $sql = $clase->Update_Delete() ;
        $conn->query($sql);
        $conn->close();
    }
}
