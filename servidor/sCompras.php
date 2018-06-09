<?php

include_once '../mvc/modelo/ProveedorDaoImp.php';
include_once '../mvc/modelo/PresupuestoDaoImp.php';
include_once '../mvc/modelo/ItemDaoImp.php';
include_once '../mvc/modelo/OrdenCompraDaoImp.php';
include_once '../mvc/modelo/DetalleOrdenCompraDaoImp.php';
include_once '../mvc/modelo/CompraDaoImp.php';
include_once '../mvc/modelo/DetalleCompraDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";
session_start();
switch ($accion) {
    case "list":
        $top = (isset($_POST["limit"])) ? $_POST["limit"] : 0;
        $pag = (isset($_POST["offset"])) ? $_POST["offset"] : 0;
        $count = 0;

        $params = array(
            "limit" => (isset($_POST["limit"])) ? $_POST["limit"] : 0,
            "offset" => (isset($_POST["offset"])) ? $_POST["offset"] : 0,
            "buscar" => (isset($_POST["search"])) ? $_POST["search"] : NULL
        );
        switch ($op) {
            case "proveedor":
                $resultado = json_encode(ProveedorDaoImp::listProveedor($params));
                break;
            case "orden.compra":
                $resultado = json_encode(OrdenCompraDaoImp::_list($params));
                break;
            case "detalle.orden.compra":
                $resultado = json_encode(DetalleOrdenCompraDaoImp::listDetalleOrdenCompra_OCompra($_POST["id"]));
                break;
            case "proveedorOrdenCompra":
                $resultado = json_encode(ProveedorDaoImp::_listOrdenCompras($params));
                break;
            case "proveedorDetalleOrdenCompra":
                $proveedor = $_POST["proveedor"];
                $resultado = json_encode(DetalleOrdenCompraDaoImp::listDetalleOrdenCompra_Proveedor($proveedor));
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
                $params = array(
                    "fecha" => $_POST["fecha"],
                    "departamento" => $_POST["departamento"]
                );
                $list = PresupuestoDaoImp::get($params);
                if (count($list) > 0) {
                    $resultado = json_encode(array(
                        "status" => TRUE,
                        "get" => $list[0]
                    ));
                } else {
                    $resultado = json_encode(array(
                        "status" => FALSE
                    ));
                }
                //$resultado = json_encode([0]);
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "OrdenCompra":
                $OrdenCompra = $mapper->map($json, new OrdenCompra());
                $OrdenCompra->IDUsuario = $_SESSION["login"]["user"]["id"];
                $resultado = OrdenCompraDaoImp::save($OrdenCompra);

                if ($resultado["status"]) {
                    foreach (json_decode($_POST["items"]) as $item) {
                        $DetalleOrdenCompra = $mapper->map($item, new DetalleOrdenCompra());
                        $DetalleOrdenCompra->IDOrdenCompra = $OrdenCompra->ID;
                        $DetalleOrdenCompra->Cantidad = $item->solicitar;
                        DetalleOrdenCompraDaoImp::save($DetalleOrdenCompra);
                    }
                }
                break;
            case "facturar.compra.orden":
                $Compra = $mapper->map($json, new Compra());
                $Compra->IDUsuario = $_SESSION["login"]["user"]["id"];
                $resultado = CompraDaoImp::save($Compra);

                if ($resultado["status"]) {
                    foreach (json_decode($_POST["rows"]) as $item) {
                        $DetalleCompra = $mapper->map($item, new DetalleCompra());
                        $DetalleCompra->IDCompra = $Compra->ID;
                        DetalleCompraDaoImp::save($DetalleCompra);
                    }
                }
                //$resultado = json_encode
                break;
            case "proveedor":
                $proveedor = $mapper->map($json, new Proveedor());
                $resultado = json_encode(ProveedorDaoImp::save($proveedor));
                break;
            case "presupuesto":
                $presupuesto = $mapper->map($json, new Presupuesto());
                $resultado = json_encode(PresupuestoDaoImp::save($presupuesto));
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
echo is_array($resultado) ? json_encode($resultado) : $resultado;
