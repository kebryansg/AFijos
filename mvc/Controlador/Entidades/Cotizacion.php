<?php

include_once 'ModelSQL.php';
class Cotizacion extends ModelSQL {
    public $tabla;
    public $ID;
    public $FechaIni;
    public $FechaFin;
    public $Observacion;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "cotizacion";
    }
}