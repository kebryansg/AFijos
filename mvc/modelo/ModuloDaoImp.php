<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Modulo.php';

class ModuloDaoImp {

    public static function save($modulo) {
        $conn = (new C_MySQL())->open();
        $response = array(); 
        $action = ($modulo->ID == 0);
        $sql = ($modulo->ID == 0) ? $modulo->Insert() : $modulo->Update();
        $bandera = $conn->query($sql);
        if ($bandera) {
            if ($modulo->ID == 0) {
                $modulo->ID = $conn->insert_id;
            }
            $response = array(
                "action" => $action ? "Crear" : "Actualizar",
                "status" => $bandera
            );
        } else {
            $response = array(
                "status" => $bandera,
                "msg" => $conn->error
            );
        }
        $conn->close();
        return $response;
    }

    public static function listModulo($params) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        $where = ($params["buscar"] != NULL) ? " where descripcion like '%" . $params["buscar"] . "%'" : "";
        //where estado = 'ACT'
        //$sql = "select SQL_CALC_FOUND_ROWS id as ID , descripcion, observacion, estado from modulo $banderapag ;";
        $sql = "select SQL_CALC_FOUND_ROWS * from modulo $where $banderapag ;";

        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );
        $conn->close();
        return $dts;
    }

    public function delete($modulo) {
        $conn = (new C_MySQL())->open();
        $sql = $modulo->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }
    
    public function listModulosRol($rol) {
        $conn = (new C_MySQL())->open();
        $sql = "select SQL_CALC_FOUND_ROWS * from viewModulosRol where rol = $rol ";
        $result = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $result;
    }
    
    

}
