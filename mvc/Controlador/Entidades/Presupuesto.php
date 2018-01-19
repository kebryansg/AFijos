<?php

include_once 'ModelSQL.php';
class Presupuesto extends ModelSQL {
    public $tabla;
    public $ID;
    public $IDDepartamento;
    public $PrestamoInicial;
    public $Compras;
    public $OrdenPedido;
    public $OrdenCompra;
    public $Año;

    function __construct() {
        $this->ID = 0;
        $this->OrdenCompra = $this->OrdenPedido = $this->PrestamoInicial = $this->Compras = 0;
        $this->tabla = "presupuesto";
    }
}
