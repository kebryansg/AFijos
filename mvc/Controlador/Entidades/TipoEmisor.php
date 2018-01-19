<?php

include_once 'ModelSQL.php';
class TipoEmisor extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "TipoEmisor";
    }
}
