<?php

include_once 'ModelSQL.php';

class OrdenPedido extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
    public $IDArea;
    public $IDUsuario;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "PEN";
        $this->Fecha = date("Y-m-d H:i:s");
        //$this->IDUsuario = "1";
        $this->tabla = "OrdenPedido";
    }
}
