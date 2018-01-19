<?php
include_once 'ModelSQL.php';
class SubClase extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $IDClase;
    function __construct() {
        $this->ID = 0;
        $this->tabla = "subclase";
    }
}
