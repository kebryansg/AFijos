<?php

include_once '../mvc/modelo/UsuarioDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$resultado = "";
switch ($accion) {
    case "list":
        $params = array(
            "limit" => (isset($_POST["limit"])) ? $_POST["limit"] : 0,
            "pag" => (isset($_POST["offset"])) ? $_POST["offset"] : 0,
            "search" => (isset($_POST["search"])) ? $_POST["search"] : NULL
        );
        switch ($op) {
            case "usuario.bodega":
                $id = $_POST["usuario"];
                $resultado = UsuarioDaoImp::_listUsuariosBodega($id);
                break;
            case "usuario.TipoMovimiento":
                $id = $_POST["usuario"];
                $resultado = UsuarioDaoImp::_listUsuariosTipoMovimiento($id);
                break;
        }
        break;
    case "get":
        switch ($op) {
            case "usuario":
                $id = $_POST["usuario"];
                $resultado = UsuarioDaoImp::_getUsuario($id);
                break;
        }
        break;
}
echo is_array($resultado) ? json_encode($resultado) : $resultado;
