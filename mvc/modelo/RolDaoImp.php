<?php

//namespace modelo;
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Rol.php';
include_once 'ModelProcedure.php';

class RolDaoImp extends ModelProcedure {

    /*public static function save($rol) {
        $conn = (new C_MySQL())->open();
        $sql = ($rol->ID == 0) ? $rol->Insert() : $sql = $rol->Update();
        
        if ($conn->query($sql)) {
            if ($rol->ID == 0) {
                $rol->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }*/

    public static function listRol($params) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($params["top"] > 0 ) ? "limit " . $params['top'] . " offset " . $params['pag'] : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewrol $banderapag ;";
        $dts = array(
            "rows" => C_MySQL::returnListAsoc($conn, $sql),
            "total" => C_MySQL::row_count($conn)
        );

        $conn->close();
        return $dts;
    }

    public function delete($rol) {
        $conn = (new C_MySQL())->open();
        $sql = $rol->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

    public static function ListPermisoRol() {
        $conn = (new C_MySQL())->open();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * from viewPermisoRol;";
        $dts = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $dts;
    }

    public static function asignarPermiso($rol, $permisos) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from Permisos where IDRol = " . $rol;
        $conn->query($sql);
        $sql = "insert into Permisos(IDRol, IDSubModulo) values";
        if (count($permisos) > 0) {
            $list = array();
            foreach ($permisos as $permiso) {
                array_push($list, "(" . $rol . "," . $permiso . ")");
            }
            $sql .= join(',', $list);
            $conn->query($sql);
        }
        $conn->close();
    }

}
