<?php

include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Persona.php';
class PersonaDaoImp {
    public static function save($usuario){
        $conn = (new C_MySQL())->open();
        if($usuario->ID == 0){
            $sql = $usuario->Insert();
        }else{
            $sql = $usuario->Update();
        }
        if($conn->query($sql)){
            if ($usuario->ID == 0) {
                $usuario->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
}
