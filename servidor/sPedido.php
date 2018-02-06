<?php

include_once '../mvc/modelo/OrdenPedidoDaoImp.php';
include_once '../mvc/modelo/DetalleOrdenPedidoDaoImp.php';


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
            case "ordenPedido":
                $resultado = json_encode(array(
                    "rows" => OrdenPedidoDaoImp::listOrdenPedido($top, $pag, $count),
                    "total" => $count
                ));
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
                $ordenPedido = $mapper->map($json, new OrdenPedido());
                $ordenPedido->IDArea = 1;
                $ordenPedido->IDUsuario = 2;

                OrdenPedidoDaoImp::save($ordenPedido);
                $resultado = $ordenPedido->ID;


                $itemsNoEstan = json_decode($_POST["items_delete"]);

                if (sizeof($itemsNoEstan) > 0) {
                    DetalleOrdenPedidoDaoImp::deleteOrdenPedido(new DetalleOrdenPedido(), $itemsNoEstan);
                }



                foreach (json_decode($_POST["items"]) as $item) {
                    $detalleOrdenPedido = $mapper->map($item, new DetalleOrdenPedido());
                    $detalleOrdenPedido->IDOrdenPedido = $ordenPedido->ID;

                    DetalleOrdenPedidoDaoImp::save($detalleOrdenPedido);


                    /* if (in_array($detalleOrdenPedido->ID, $itemsNuevos)) {
                      DetalleOrdenPedidoDaoImp::save($detalleOrdenPedido);
                      } */

                    /* else if (in_array($detalleOrdenPedido->ID, $itemsNoEstan)) {
                      DetalleOrdenPedidoDaoImp::delete($detalleOrdenPedido);
                      } */
                }



                /* foreach ($items as $item) {
                  $detalleOrdenPedido = $mapper->map($item, new DetalleOrdenPedido());
                  $detalleOrdenPedido->IDOrdenPedido = $ordenPedido->ID;
                  DetalleOrdenPedidoDaoImp::save($detalleOrdenPedido);
                  } */
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
