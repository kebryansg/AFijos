<?php

final class C_MySQL {

    protected $mysqli;

    function __construct() {
        //$this->open();
    }

    public static function row_count($conn) {
        $total = -1;
        $sql = "select FOUND_ROWS() as total;";
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $total = $row["total"];
            }
            $result->free();
        }
        //$conn->close();
        return $total;
    }

    public static function returnListAsoc_Total($conn, $params) {
        $list = array();
        $sqls = array(
            "SET @total = 0;",
            "CALL " . $params["procedure"] . "('" . $params["params"] . "',@total);",
            "SELECT @total as total;"
        );
        $conn->multi_query(join($sqls, ""));
        do {
            if ($resultado = $conn->store_result()) {
                array_push($list, $resultado->fetch_all(MYSQLI_ASSOC));
                $resultado->free();
            }
        } while ($conn->more_results() && $conn->next_result());

        $result = array(
            "rows" => $list[0],
            "total" => $list[1][0]["total"]
        );
        return $result;
    }
    public static function queryListAsoc_Total($conn, $params) {
        $list = array();
        $sqls = array(
            $params["sql"],
            "SELECT FOUND_ROWS() as total;"
        );
        $conn->multi_query(join($sqls, ""));
        do {
            if ($resultado = $conn->store_result()) {
                array_push($list, $resultado->fetch_all(MYSQLI_ASSOC));
                $resultado->free();
            }
        } while ($conn->more_results() && $conn->next_result());

        $result = array(
            "rows" => $list[0],
            "total" => $list[1][0]["total"]
        );
        return $result;
    }

    public static function returnListAsoc($conn, $sql) {
        $list = array();
        if($resultado = $conn->query($sql)){
            $list = $resultado->fetch_all(MYSQLI_ASSOC);
        }
//        foreach ($conn->query($sql) as $row) {
//            array_push($list, $row);
//        }
        //$conn->close();
        return $list;
    }

    public static function returnRowAsoc($conn, $sql) {
        $result = NULL;
        if($resultado  = $conn->query($sql)) {
            $result = $resultado->fetch_assoc();
        }
//        foreach ($conn->query($sql) as $row) {
//            $result = $row;
//        }
        //$conn->close();
        return $result;
    }

    public function open() {
        //$this->mysqli = new mysqli("localhost", "root", "12345", "cevroos_antaresv2");
        $this->mysqli = new mysqli("localhost", "kbsg", "kbsg", "activos");
        //$this->mysqli = new mysqli("localhost", "kbsg", "kbsg", "activos", 3309);
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
        $this->mysqli->set_charset("utf8");
        return $this->mysqli;
    }

}
