<?php
include_once 'ModelSQL.php';
class Unidad extends ModelSQL {
    public $tabla;
    public $ID;
    public $Abreviacion;
    public $Descripcion;
    public $Observacion;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "unidad";
    }
}
