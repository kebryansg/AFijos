<?php
include_once 'ModelSQL.php';
class Tipo extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $VidaUtil;
    public $Depreciable;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "tipo";
    }
}
