<?php

include_once 'ModelSQL.php';
class DetalleOrdenCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Cantidad;
    public $PrecioCompra;
    public $IDOrdenCompra;
    public $IDItem;
    

    function __construct() {
        $this->ID = 0;
        //$this->Estado = "ACT";
        $this->tabla = "DetalleOrdenCompra";
    }
}
