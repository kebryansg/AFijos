<?php

include_once '../mvc/modelo/ProveedorDaoImp.php';
include_once '../mvc/modelo/PresupuestoDaoImp.php';
include_once '../mvc/modelo/ItemDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";

switch ($accion) {
    case "list":
        $top = (isset($_POST["limit"])) ? $_POST["limit"] : 0;
        $pag = (isset($_POST["offset"])) ? $_POST["offset"] : 0;
        $count = 0;
        switch ($op) {
            case "proveedor":
                $resultado = json_encode(array(
                    "rows" => ProveedorDaoImp::listProveedor($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "items":
                $resultado = json_encode(array(
                    "rows" => ItemDaoImp::listItem($top, $pag, $count),
                    "total" => $count
                ));
                break;
        }
        break;
    case "get":
        switch ($op) {
            case "presupuesto":
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "proveedor":
                $proveedor = $mapper->map($json, new Proveedor());
                ProveedorDaoImp::save($proveedor);
                $resultado = $proveedor->ID;
                break;
            case "presupuesto":
                $presupuesto = $mapper->map($json, new Presupuesto());
                PresupuestoDaoImp::save($presupuesto);
                $resultado = $presupuesto->ID;
                break;
        }
        break;
    case "delete":
        $key = "id";
        // Definir la obtención del id o ids enviados en la petición
        if (array_key_exists("ids", $_POST)) {
            $key = "ids";
        }
        switch ($op) {
            case "proveedor":
                $proveedor = new Proveedor();
                $proveedor->ID = $_POST[$key];
                ProveedorDaoImp::delete($proveedor);
                break;
        }
        break;
}
echo $resultado;
