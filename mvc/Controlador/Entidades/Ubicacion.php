<?php

include_once 'ModelSQL.php';

class Ubicacion extends ModelSQL {

    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $IDBodega;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "ubicacion";
    }

}
