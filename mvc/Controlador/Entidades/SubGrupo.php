<?php

include_once 'ModelSQL.php';
class SubGrupo  extends ModelSQL{
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Observacion;
    public $Estado;
    public $IDGrupo;
    function __construct() {
        $this->ID = 0;
        $this->tabla = "subgrupo";
    }

}
