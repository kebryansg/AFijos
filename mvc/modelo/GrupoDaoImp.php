<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Grupo.php';

class GrupoDaoImp {
    public static function save($grupo){
        //$grupo =  new Grupo();
        $conn = (new C_MySQL())->open();
        $sql = "";
        if($grupo->ID == 0){
            $sql = $grupo->Insert();
        }else{
            $sql = $grupo->Update();
        }
        if($conn->query($sql)){
            if($grupo->ID == 0){
                $grupo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    public static function listGrupo($top, $pag, &$count){
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion,observacion,estado from grupo $banderapag ;";
        
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    
    public function delete($grupo) {
        $conn = (new C_MySQL())->open();
        $sql = $grupo->Update_Delete() ;
        $conn->query($sql);
        $conn->close();
    }
}
