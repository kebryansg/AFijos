<?php

include_once 'ModelSQL.php';

class SubModulo extends ModelSQL {

    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $IDModulo;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "submodulo";
    }

}
