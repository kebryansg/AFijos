<?php

include_once '../mvc/modelo/OrdenPedidoDaoImp.php';
include_once '../mvc/modelo/DetalleOrdenPedidoDaoImp.php';


include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";

switch ($accion) {
    case "get":
        $id = $_POST["id"];

        switch ($op) {
            case "OrdenPedido":
                $resultado = json_encode(OrdenPedidoDaoImp::get($id));
                break;
        }
        break;
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
            case "ordenPedido":
                $params["user"]= (isset($_POST["user"])) ? $_POST["user"] : -1; //$_POST["user"];
                $resultado = json_encode(OrdenPedidoDaoImp::listOrdenPedido($params));
                break;
            case "DetalleordenPedido":
                $resultado = json_encode(DetalleOrdenPedidoDaoImp::listDetalleOrdenPedido($_POST["OrdenPedido"]));
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "aprobacionOrdenPedido":
                $ordenPedido = $mapper->map($json, new OrdenPedido());
                OrdenPedidoDaoImp::aprobacionPedido($ordenPedido);
                $resultado = "";

                break;
            case "ordenPedido":
                session_start();
                $ordenPedido = $mapper->map($json, new OrdenPedido());
                $ordenPedido->IDUsuario = $_SESSION["login"]["user"]["id"];

                $resultado = OrdenPedidoDaoImp::save($ordenPedido);

                if ($resultado["status"]) {
                    $itemsNoEstan = json_decode($_POST["items_delete"]);

                    if (sizeof($itemsNoEstan) > 0) {
                        DetalleOrdenPedidoDaoImp::deleteOrdenPedido(new DetalleOrdenPedido(), $itemsNoEstan);
                    }

                    foreach (json_decode($_POST["items"]) as $item) {
                        $detalleOrdenPedido = $mapper->map($item, new DetalleOrdenPedido());
                        $detalleOrdenPedido->IDOrdenPedido = $ordenPedido->ID;
                        $detalleOrdenPedido->Saldo = $detalleOrdenPedido->Cantidad;
                        DetalleOrdenPedidoDaoImp::save($detalleOrdenPedido);
                    }
                }
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
            case "tipo":
                $tipo = new Tipo();
                $tipo->ID = $_POST[$key];
                TipoDaoImp::delete($tipo);
                break;
        }
        break;
}
echo $resultado;
