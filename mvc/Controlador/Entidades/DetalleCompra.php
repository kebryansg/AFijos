<?php
include_once 'ModelSQL.php';

class DetalleCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $IDDetalleOrdenCompra;
    public $Descripcion;
    public $Precio;
    public $Cantidad;
    public $IDCompra;

    function __construct() {
        $this->ID = 0;
        $this->tabla = "detallecompra";
    }
}