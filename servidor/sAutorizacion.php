<?php

include_once '../mvc/modelo/TipoDocumentoDaoImp.php';
include_once '../mvc/modelo/TipoMovimientoDaoImp.php';
include_once '../mvc/modelo/BodegaDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";


switch ($accion) {
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "tipoMovimiento":
                $tipoMovimiento = $mapper->map($json, new TipoMovimiento());
                $resultado = json_encode(TipoMovimientoDaoImp::save($tipoMovimiento));
                break;
            case "tipoDocumento":
                $tipoDocumento = $mapper->map($json, new TipoDocumento());
                $resultado = json_encode(TipoDocumentoDaoImp::save($tipoDocumento));
                break;
            case "bodegaTipoMovimiento":
                $bodega = $_POST["bodega"];
                $movimientos = json_decode($_POST["movimientos"]);
                BodegaDaoImp::asignarTipoMovimiento($bodega, $movimientos);
                break;
            case "bodega.usuario":
                $usuario = $_POST["usuario"];
                $bodegas = json_decode($_POST["bodegas"],true);
                BodegaDaoImp::asignarUsuario($usuario, $bodegas);
                break;
        }
        break;
    case "list":
        $params = array(
            "top" => (isset($_POST["limit"])) ? $_POST["limit"] : 0,
            "pag" => (isset($_POST["offset"])) ? $_POST["offset"] : 0,
            "buscar" => (isset($_POST["search"])) ? $_POST["search"] : NULL
        );

        switch ($op) {
            case "tipoMovimiento":
                $resultado = json_encode(TipoMovimientoDaoImp::_list($params));
                break;
            case "tipoMovimientoxBodega":
                $bodega = $_POST["bodega"];
                $resultado = json_encode(BodegaDaoImp::_listTipoMovimiento($bodega));
                break;
            case "tipoDocumento":
                $resultado = json_encode(TipoDocumentoDaoImp::_list($params));
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
            case "modulo":
                $modulo = new Modulo();
                $modulo->ID = $_POST[$key];
                ModuloDaoImp::delete($modulo);
                break;
            case "rol":
                $rol = new Rol();
                $rol->ID = $_POST[$key];
                RolDaoImp::delete($rol);
                break;
        }
        break;
}
echo $resultado;
