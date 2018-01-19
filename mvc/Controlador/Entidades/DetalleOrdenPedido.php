<?php

include_once 'ModelSQL.php';

class DetalleOrdenPedido extends ModelSQL {
    public $tabla;
    public $ID;
    public $Cantidad;
    public $Descripcion;
    public $Observacion;
    public $IDOrdenPedido;
    public $PrecioRef;

    function __construct() {
        $this->ID = 0;
        //$this->Estado = "ACT";
        $this->tabla = "DetalleOrdenPedido";
    }
}

