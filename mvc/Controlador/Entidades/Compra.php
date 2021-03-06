<?php

include_once 'ModelSQL.php';

class Compra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Fecha;
    public $IDUsuario;
    public $IDProveedor;
    public $DetalleFactura;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Fecha = date("Y-m-d H:i:s");
        $this->Estado = "ACT";
        $this->tabla = "compra";
    }
}
