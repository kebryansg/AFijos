<?php

include_once 'ModelProcedure.php';
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/DetalleCompra.php';

class DetalleCompraDaoImp extends ModelProcedure {

    public static function _list($codigo) {
        $conn = (new C_MySQL())->open();
        $sql = "SELECT 
                    dc.* ,
                    0 ingreso
                from detallecompra dc
                join compra c on dc.idCompra = c.id
                where getVal(c.detalleFactura, 'codigo') = '00101011';";
//        $sql = "SELECT 
//                    dc.* 
//                from detallecompra dc
//                join compra c on dc.idCompra = c.id
//                where getVal(c.detalleFactura, 'codigo') = '$codigo';";
        $response = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $response;
    }

}
