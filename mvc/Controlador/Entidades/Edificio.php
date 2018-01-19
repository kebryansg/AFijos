<?php
include_once 'ModelSQL.php';

class Edificio extends ModelSQL {
    public $tabla;
    public $ID;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $Estado;
    public $IDCiudad;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "edificio";
    }
}
