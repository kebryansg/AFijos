<?php

include_once 'ModelSQL.php';

class DetalleCotizacion extends ModelSQL {

    public $tabla;
    public $ID;
    public $IDCotizacion;
    public $IDDetalleOrdenPedido;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "DetalleCotizacion";
    }

}
