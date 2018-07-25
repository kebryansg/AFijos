<?php

abstract class ModelSQL {

    public $exception = array("TABLA", "ID", "EXCEPTION", "COD");

    public function Insert() {
        $sql = "";
        $getter_names_attr = (array) $this;
        $attr = array();
        $values = array();
        foreach ($getter_names_attr as $key => $value) {
            $bool = !is_bool(array_search(strtoupper($key), $this->exception));
            if (isset($value) && !$bool) {
                array_push($attr, $key);
                if (is_bool($value)) {
                    array_push($values, "'" . ($value ? "1" : "0") . "'");
                } elseif (is_object($value) || is_array($value)) {
                    array_push($values, "'" . json_encode($value) . "'");
                } else {
                    array_push($values, "'" . $value . "'");
                }
            }
        }
        $sql = "INSERT INTO " . $getter_names_attr["tabla"] . "(" . join(",", $attr) . ") VALUES(" . join(",", $values) . ");";
        return $sql;
    }

    public function Update() {
        $sql = "";
        $getter_names_attr = (array) $this;
        $values = array();
        foreach ($getter_names_attr as $key => $value) {
            $bool = !is_bool(array_search(strtoupper($key), $this->exception));
            if (isset($value) && !$bool) {
                if (is_bool($value)) {
                    array_push($values, $key . " = " . "'" . ($value ? "1" : "0") . "'");
                } elseif (is_object($value) || is_array($value)) {
                    array_push($values, $key . " = " . "'" . json_encode($value) . "'");
                } else {
                    array_push($values, $key . " = " . "'" . $value . "'");
                }
            }
        }
        $sql = "UPDATE " . $getter_names_attr["tabla"] . " SET " . join(",", $values) . " WHERE ID = " . $getter_names_attr["ID"];
        return $sql;
    }

    public function Update_Delete() {
        if (is_array($getter_names_attr["ID"])) {
            $sql = "UPDATE " . $getter_names_attr["tabla"] . " SET estado = 'INA' WHERE ID IN (" . join(',', $getter_names_attr["ID"]) . ")";
        } else {
            $sql = "UPDATE " . $getter_names_attr["tabla"] . " SET estado = 'INA' WHERE ID = " . $getter_names_attr["ID"];
        }

        return $sql;
    }

}
