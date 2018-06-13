<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Proveedor.php';
include_once 'ModelProcedure.php';

class ProveedorDaoImp extends ModelProcedure {
//    public static function save($proveedor) {
//        $conn = (new C_MySQL())->open();
//        $sql = "";
//        if ($proveedor->ID == 0) {
//            $sql = $proveedor->Insert();
//        } else {
//            $sql = $proveedor->Update();
//        }
//        if ($conn->query($sql)) {
//            if ($proveedor->ID == 0) {
//                $proveedor->ID = $conn->insert_id;
//            }
//        }
//        $conn->close();
//    }
    
    public static function _listOrdenCompras($params) {
        $conn = (new C_MySQL())->open();
        
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        $where = ($params["buscar"] != NULL) ? " where nombre like '%" . $params["buscar"] . "%' or identificacion like '%" . $params["buscar"] . "%' " : "";
        
        $sql = "select * from viewproveedor_ordencompra $where $banderapag ;";

        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
             "total" => C_MySQL::row_count($conn)
        );
        $conn->close();
        return $dts;
    }
    public static function _listFacturaPendiente() {
        $conn = (new C_MySQL())->open();
        $sql = "select * from viewproveedor_facturarpendientes;";
        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
             "total" => 0
        );
        $conn->close();
        return $dts;
    }
    
    public static function listProveedor($params) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["limit"] > 0 ) ? "limit " . $params['limit'] . " offset " . $params['offset'] : "";
        $where = ($params["buscar"] != NULL) ? " where nombre like '%" . $params["buscar"] . "%' or identificacion like '%" . $params["buscar"] . "%' " : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from Proveedor $where $banderapag ;";

        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );
        $conn->close();
        return $dts;
    }

//    public function delete($proveedor) {
//        $conn = (new C_MySQL())->open();
//        $sql = $proveedor->Update_Delete();
//        $conn->query($sql);
//        $conn->close();
//    }
}
