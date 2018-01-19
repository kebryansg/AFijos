<?php

include_once 'ModelSQL.php';

class Proveedor extends ModelSQL {
    public $tabla;
    public $ID;
    public $IDTipoIdentificacion;
    public $IDContribuyente;
    public $IDTipoEmisor;
    public $Identificacion;
    public $Nombre;
    public $Telefono;
    public $Celular;
    public $AutorizacionSRI;
    public $Email;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "Proveedor";
    }
}