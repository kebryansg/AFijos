<?php

include_once 'ModelSQL.php';

class DetalleCotizacionProveedor extends ModelSQL {

    public $tabla;
    public $ID;
    public $IDDetalleCotizacion;
    public $IDProveedor;
    public $Cantidad;
    public $Precio;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "detallecotizacionproveedor";
    }

}
