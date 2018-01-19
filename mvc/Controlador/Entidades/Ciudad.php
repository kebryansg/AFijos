<?php

include_once 'ModelSQL.php';

class Ciudad extends ModelSQL {

    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $IDPais;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "ciudad";
    }

}
