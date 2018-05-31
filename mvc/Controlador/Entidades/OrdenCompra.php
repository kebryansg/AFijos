<?php
include_once 'ModelSQL.php';

class OrdenCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
//    public $IDOrdenPedido;
    public $IDProveedor;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->Fecha = date("Y-m-d H:i:s");
        $this->tabla = "OrdenCompra";
    }
}

