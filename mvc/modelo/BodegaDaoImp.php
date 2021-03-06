<?php

include_once '../mvc/Controlador/Entidades/Bodega.php';

class BodegaDaoImp extends ModelProcedure {

    public static function listBodega($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewbodega $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public static function asignarTipoMovimiento($bodega, $movimientos) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from BodegaTipoMovimiento where idbodega = " . $bodega;
        $conn->query($sql);
        $sql = "insert into BodegaTipoMovimiento(idbodega, idtipomovimiento) values";
        if (count($movimientos) > 0) {
            $list = array();
            foreach ($movimientos as $movimiento) {
                array_push($list, "(" . $bodega . "," . $movimiento . ")");
            }
            $sql .= join(',', $list);
            $conn->query($sql);
        }
        $conn->close();
    }

    public static function asignarUsuario($usuario, $bodegas) {
        $conn = (new C_MySQL())->open();
        $sql = "Delete from bodegausuario where idusuario = $usuario;";
        $conn->query($sql);
        $sql = "insert into bodegausuario(idbodega, idusuario) values";
        if (count($bodegas) > 0) {
            $list = array();
            foreach ($bodegas as $bodega) {
                array_push($list, "(" . $bodega . "," . $usuario . ")");
            }
            $sql .= join(',', $list);
            $conn->query($sql);
        }
        $conn->close();
    }

    public static function _listTipoMovimiento($bodega) {
        $conn = (new C_MySQL())->open();

        $sql = "select * from BodegaTipoMovimiento where idbodega = $bodega ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

}
