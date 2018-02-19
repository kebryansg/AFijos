<?php

include_once 'ModelSQL.php';

class OrdenPedido extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
    public $IDDepartamento;
    public $IDUsuario;
    public $Estado;
    public $Observacion;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "PEN";
        //$this->Fecha = date("Y-m-d H:i:s");
        //$this->IDUsuario = "1";
        $this->Observacion = "";
        $this->tabla = "OrdenPedido";
    }
}
