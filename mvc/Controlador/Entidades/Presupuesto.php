<?php

include_once 'ModelSQL.php';
class Presupuesto extends ModelSQL {
    public $tabla;
    public $ID;
    public $IDDepartamento;
    public $PresupuestoInicial;
    public $Compras;
    public $OrdenPedido;
    public $OrdenCompra;
    public $Año;
    public $Meses;

    function __construct() {
        $this->ID = 0;
        $this->OrdenCompra = $this->OrdenPedido = $this->PresupuestoInicial = $this->Compras = 0;
        $this->tabla = "presupuesto";
    }
}
