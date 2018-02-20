<?php
include_once 'ModelSQL.php';

class OrdenCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
    public $IDOrdenPedido;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "OrdenCompra";
    }
}

