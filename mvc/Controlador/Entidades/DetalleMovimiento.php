<?php

include_once 'ModelSQL.php';

class DetalleMovimiento extends ModelSQL {

    public $tabla;
    public $ID;
    public $IDMovimiento;
    public $IDBodega;
    public $IDProducto;
    public $Cantidad;
    public $CantidadPendiente;
    public $Costo;
    public $Tipo;

    //public $Estado;

    function __construct() {
        $this->ID = 0;
        //$this->Estado = "ACT";
        $this->tabla = "detallemovimiento";
    }

}
