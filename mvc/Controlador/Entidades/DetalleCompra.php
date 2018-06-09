<?php
include_once 'ModelSQL.php';

class DetalleCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Precio;
    public $Cantidad;
    public $IDDetalleOrdenCompra;
    public $IDCompra;

    function __construct() {
        $this->ID = 0;
        $this->Cantidad = 0;
        $this->Precio = 0;
        $this->tabla = "detallecompra";
    }
}