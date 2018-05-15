<?php

class ModelProcedure {

    public static function save($obj) {
        $conn = (new C_MySQL())->open();
        $response = array();
        $action = ($obj->ID == 0);
        $sql = ($obj->ID == 0) ? $obj->Insert() : $obj->Update();
        $bandera = $conn->query($sql);
        if ($bandera) {
            $obj->Id = ($obj->ID == 0)? $conn->insert_id: $obj->ID;
            $response = array(
                "action" => $action ? "Crear" : "Actualizar",
                "status" => $bandera
            );
        } else {
            $response = array(
                "status" => $bandera,
                "msg" => $conn->error
            );
        }
        $conn->close();
        return $response;
    }

    public function delete($obj) {
        $conn = (new C_MySQL())->open();
        $sql = $obj->Update_Delete();
        $conn->query($sql);
        $conn->close();
    }

}