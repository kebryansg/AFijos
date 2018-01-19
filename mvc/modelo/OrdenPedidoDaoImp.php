<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/OrdenPedido.php';

class OrdenPedidoDaoImp {
    public static function save($OrdenPedido) {
        $conn = (new C_MySQL())->open();
        $sql = "";
        if ($OrdenPedido->ID == 0) {
            $sql = $OrdenPedido->Insert();
        } else {
            $sql = $OrdenPedido->Update();
        }
        if ($conn->query($sql)) {
            if ($OrdenPedido->ID == 0) {
                $OrdenPedido->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }

    public static function listOrdenPedido($top, $pag, &$count) {
        $conn = (new C_MySQL())->open();
        $banderapag = ($top > 0 ) ? "limit $top offset $pag" : "";
        //where estado = 'ACT'
        $sql = "select SQL_CALC_FOUND_ROWS * from viewOrdenPedido $banderapag ;";

        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }

    public function delete($OrdenPedido) {
        $conn = (new C_MySQL())->open();
        $sql = $OrdenPedido->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}
