<?php

include_once '../mvc/modelo/ModuloDaoImp.php';
include_once '../mvc/modelo/SubModuloDaoImp.php';

include_once '../mvc/modelo/RolDaoImp.php';
include_once '../mvc/modelo/PersonaDaoImp.php';
include_once '../mvc/modelo/UsuarioDaoImp.php';
//include_once '../mvc/modelo/PermisoSubModuloDaoImp.php';



include_once '../mvc/Controlador/JsonMapper.php';
$accion = $_POST["accion"];
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";


switch ($accion) {
    case "save":
        $json = json_decode($_POST["datos"]);
        switch ($op) {
            case "usuario":
                $persona = $mapper->map($json, new Persona());
                PersonaDaoImp::save($persona);

                $usuario = $mapper->map($json, new Usuario());
                $usuario->IDPersona = $persona->ID;

                UsuarioDaoImp::save($usuario);
                break;
            case "rol":
                $rol = $mapper->map($json, new Rol());
                $resultado = RolDaoImp::save($rol);

                if ($resultado["status"]) {
                    $pSubModulos = json_decode($_POST["permisos"]);
                    RolDaoImp::asignarPermiso($rol->ID, $pSubModulos);
                }
                break;
            case "submodulo":
                $submodulo = $mapper->map($json, new SubModulo());
                SubModuloDaoImp::save($submodulo);
                $resultado = $submodulo->ID;
                break;
            case "modulo":
                $modulo = $mapper->map($json, new Modulo());
                $resultado = ModuloDaoImp::save($modulo);

                if ($resultado["status"]) {
                    $subs = json_decode($_POST["subModulos"]);
                    foreach ($subs as $sub) {
                        $subModulo = $mapper->map($sub, new SubModulo());
                        $subModulo->IDModulo = $modulo->ID;
                        SubModuloDaoImp::save($subModulo);
                    }
                }
                //$resultado = $modulo->ID;
                $resultado = json_encode($resultado);
                break;
        }
        break;
    case "get":
        switch ($op) {
            case "usuario":
                $datos = UsuarioDaoImp::_getUsuario($_POST["id"]);
                $resultado = json_encode($datos);
                break;
        }
        break;
    case "list":
        $top = (isset($_POST["limit"])) ? $_POST["limit"] : 0;
        $pag = (isset($_POST["offset"])) ? $_POST["offset"] : 0;
        $params = array(
            "top" => (isset($_POST["limit"])) ? $_POST["limit"] : 0,
            "pag" => (isset($_POST["offset"])) ? $_POST["offset"] : 0,
            "buscar" => (isset($_POST["search"])) ? $_POST["search"] : NULL
        );

        $count = 0;
        switch ($op) {
            case "Menu":
                $Modulos = ModuloDaoImp::listModulosRol("1");
                for ($i = 0; $i < count($Modulos); $i++) {
                    $subModulos = array(
                        array(
                            "descripcion" => "Catálogo",
                            "sub" => array()
                        )
                    );
                    $subModulosBruto = SubModuloDaoImp::listSubModuloxIN($Modulos[$i]["sub"]);
                    foreach ($subModulosBruto as $sm) {
                        if ($sm["catalogo"] === "1") {
                            array_push($subModulos[0]["sub"], $sm);
                        } else {
                            array_push($subModulos, $sm);
                        }
                    }
                    $Modulos[$i]["sub"] = ($subModulos);
                }
                $resultado = json_encode($Modulos);
                break;
            case "usuario":
                $resultado = json_encode(array(
                    "rows" => UsuarioDaoImp::listUsuarios($top, $pag, $count),
                    "total" => $count
                ));
                break;
            case "permisosubmodulo":
                $resultado = json_encode(PermisoSubModuloDaoImp::listPermisoSubModulo($_POST["rol"]));
                break;
            case "permisoRol":
                $resultado = json_encode(RolDaoImp::ListPermisoRol());
                break;
            case "submodulo":
                $resultado = json_encode(SubModuloDaoImp::listSubModulo($params));
                break;
            case "submoduloXmodulo":
                $idModulo = $_POST["modulo"];
                $resultado = json_encode(SubModuloDaoImp::listSubModuloxModulo($idModulo));
                break;
            case "modulo":
                $resultado = json_encode(ModuloDaoImp::listModulo($params));
                break;
            case "rol":
                $resultado = json_encode(RolDaoImp::listRol($params));
                break;
            case "rol.select":
                $resultado = json_encode(array(
                    "rows" => RolDaoImp::_list()
                ));
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
            case "submodulo":
                $submodulo = new SubModulo();
                $submodulo->ID = $_POST[$key];
                SubModuloDaoImp::delete($submodulo);
                break;
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
