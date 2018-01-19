<?php

include_once 'ModelSQL.php';

class Fabricante extends ModelSQL {
    public $tabla;
    public $ID;
    public $Identificacion;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $Email;
    public $Website;
    public $Contacto;
    public $ContactoTelefono;
    public $ContactoEmail;
    public $Observacion;
    public $Estado;
    public $IDPais;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "fabricante";
    }
}
