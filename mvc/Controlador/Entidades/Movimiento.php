<?php

include_once 'ModelSQL.php';
class Movimiento extends ModelSQL{
    public $tabla;
    public $ID;
    public $Fecha;
    public $Observacion;
    public $NDocumento;
    public $DetalleRegistro;
    public $IDTipoMovimiento;
    public $IDTipoDocumento;
    public $IDCompra;

    //public $Estado;

    function __construct() {
        $this->ID = 0;
        //$this->Estado = "ACT";
        $this->Fecha = date("Y-m-d H:i:s");
        $this->tabla = "movimiento";
    }

}