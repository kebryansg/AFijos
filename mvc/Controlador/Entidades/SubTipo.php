<?php
include_once 'ModelSQL.php';
class SubTipo extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $VidaUtil;
    public $Depreciable;
    public $IDTipo;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "subtipo";
    }
}
