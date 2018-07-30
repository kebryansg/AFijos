<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Grupo.php';

class GrupoDaoImp extends ModelProcedure{
//    public static function save($grupo){
//        //$grupo =  new Grupo();
//        $conn = (new C_MySQL())->open();
//        $sql = "";
//        if($grupo->ID == 0){
//            $sql = $grupo->Insert();
//        }else{
//            $sql = $grupo->Update();
//        }
//        if($conn->query($sql)){
//            if($grupo->ID == 0){
//                $grupo->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }
    public static function listGrupo($params){
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        $where = ($params["buscar"] != NULL) ? " where descripcion like '%" . $params["buscar"] . "%' " : "";
        
        $sql = "select SQL_CALC_FOUND_ROWS * from grupo $where $banderapag ;";
        
        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );
        
        $conn->close();
        return $dts;
    }
    
//    public function delete($grupo) {
//        $conn = (new C_MySQL())->open();
//        $sql = $grupo->Update_Delete() ;
//        $conn->query($sql);
//        $conn->close();
//    }
}
