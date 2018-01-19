<?php

include_once 'ModelSQL.php';

class Usuario extends ModelSQL {
    public $tabla;
    public $ID;
    public $username;
    public $password;
    public $IDPersona;
    public $IDRol;
    public $Estado;
    
    
    function __construct() {
        $this->ID = 0;
        $this->tabla = "usuario";
        $this->Estado = "ACT";
    }
}
