<?php

include_once 'ModelSQL.php';
class DetalleOrdenCompra extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Cantidad;
    //public $CantFacturada;
    //public $PrecioCompra;
    public $Precio;
    public $IDOrdenCompra;
    public $IDDetalleOrdenPedido;
    

    function __construct() {
        $this->ID = 0;
        $this->Cantidad = 0;
        $this->Precio = 0;
        $this->tabla = "DetalleOrdenCompra";
    }
}
