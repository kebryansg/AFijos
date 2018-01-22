<?php

include_once 'ModelSQL.php';
class Item extends ModelSQL {
    public $tabla;
    public $ID;
    public $Descripcion;
    public $Stock;
    public $Estado;

    function __construct() {
        $this->ID = 0;
        $this->Estado = "ACT";
        $this->tabla = "items";
    }
}
