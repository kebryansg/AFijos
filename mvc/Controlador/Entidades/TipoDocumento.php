<?php

include_once 'ModelSQL.php';
class TipoDocumento extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "TipoDocumento";
    }
}

