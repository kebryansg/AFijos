<?php

include_once '../mvc/modelo/PaisDaoImp.php';
include_once '../mvc/modelo/CiudadDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";
switch ($accion) {
    case "list":
        $params = array(
            "limit" => (isset($_POST["limit"])) ? $_POST["limit"] : 0,
            "offset" => (isset($_POST["offset"])) ? $_POST["offset"] : 0,
            "buscar" => (isset($_POST["search"])) ? $_POST["search"] : ""
        );
        switch ($op) {
            case "pais":
                $resultado = json_encode(PaisDaoImp::_list($params));
                break;
            case "ciudad":
                $resultado = json_encode(CiudadDaoImp::_list($params));
                break;
        }
        break;
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "ciudad":
                $ciudad = $mapper->map($json, new Ciudad());
                $resultado = CiudadDaoImp::save($ciudad);
                break;
            case "pais":
                $pais = $mapper->map($json, new Pais());
                $resultado = PaisDaoImp::save($pais);
                break;
        }
        break;
    case "delete":
        break;
}
echo is_array($resultado)? json_encode($resultado): $resultado;
