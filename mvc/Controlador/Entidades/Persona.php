<?php

include_once 'ModelSQL.php';

class Persona extends ModelSQL {

    public $tabla;
    public $ID;
    public $Cedula;
    public $PrimerNombre;
    public $SegundoNombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Telefono;
    public $Email;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "persona";
    }

}
