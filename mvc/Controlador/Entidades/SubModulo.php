<?php

include_once 'ModelSQL.php';

class SubModulo extends ModelSQL {

    public $tabla;
    public $ID;
    public $Descripcion;
    public $Ruta;
    public $Icon;
    public $Catalogo;
    public $Observacion;
    public $Estado;
    public $IDModulo;

    function __construct() {
        $this->ID = 0;
        
        $this->Ruta = "";
        $this->Icon = "adjust";
        $this->Catalogo = 0;
        
        $this->Estado = "ACT";
        $this->tabla = "submodulo";
    }

}
