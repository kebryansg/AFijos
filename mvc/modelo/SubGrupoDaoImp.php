<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/SubGrupo.php';

class SubGrupoDaoImp {

    public static function save($subGrupo) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($subGrupo->ID == 0) {
            $sql = $subGrupo->Insert();
        } else {
            $sql = $subGrupo->Update();
        }
        if ($conn->query($sql)) {
            if ($subGrupo->ID == 0) {
                $subGrupo->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    
    public static function listSubGrupo($top, $pag, &$count){
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        $sql = "select SQL_CALC_FOUND_ROWS * from viewSubGrupo $banderapag ;";
        
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    public function delete($subGrupo) {
        $conn = (new C_MySQL())->open();
        $sql = $subGrupo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
}
