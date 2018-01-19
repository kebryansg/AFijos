<?php

include_once '../mvc/modelo/GrupoDaoImp.php';
include_once '../mvc/modelo/ClaseDaoImp.php';
include_once '../mvc/modelo/SubGrupoDaoImp.php';
include_once '../mvc/modelo/SubClaseDaoImp.php';
include_once '../mvc/modelo/CentrocostoDaoImp.php';
include_once '../mvc/modelo/PaisDaoImp.php';
include_once '../mvc/modelo/CiudadDaoImp.php';

include_once '../mvc/Controlador/JsonMapper.php';
$op = $_POST["op"];
$mapper = new JsonMapper();
$resultado = "";
switch ($op) {
    case "SaveCiudad":
        $json = json_decode($_POST["datos"]);
        $ciudad = $mapper->map($json, new Ciudad());

        CiudadDaoImp::save($ciudad);
        $resultado = $ciudad->ID;
        break;
    case "SavePais":
        $json = json_decode($_POST["datos"]);
        $pais = $mapper->map($json, new Pais());

        PaisDaoImp::save($pais);
        $resultado = $pais->ID;
        break;
    case "SaveCentro":
        $json = json_decode($_POST["datos"]);
        $centrocosto = $mapper->map($json, new Centrocosto());

        CentrocostoDaoImp::save($centrocosto);
        $resultado = $centrocosto->ID;
        break;
    case "SaveGrupo":
        $json = json_decode($_POST["datos"]);

        $subgrupo = $mapper->map($json, new SubGrupo());

        SubGrupoDaoImp::save($subgrupo);
        $resultado = $subgrupo->ID;
        break;
    case "SaveSubGrupo":
        $json = json_decode($_POST["datos"]);
        $subGrupo = $mapper->map($json, new SubGrupo());

        SubGrupoDaoImp::save($subGrupo);
        $resultado = $subGrupo->ID;
        break;

    case "SaveClase":
        $json = json_decode($_POST["datos"]);
        $clase = $mapper->map($json, new Clase());

        ClaseDaoImp::save($clase);

        $resultado = $clase->ID;
        break;

    case "SaveSubClase":
        $json = json_decode($_POST["datos"]);
        $subClase = $mapper->map($json, new SubClase());

        SubClaseDaoImp::save($subClase);
        $resultado = $subClase->ID;
        break;


    case "grupo_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => GrupoDaoImp::listGrupo($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    case "clase_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => ClaseDaoImp::listClase($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;

    case "subgrupo_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => SubGrupoDaoImp::listSubGrupo($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    case "subclase_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => SubClaseDaoImp::listSubClase($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    case "centrocosto_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => CentrocostoDaoImp::listCentro($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    case "pais_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => PaisDaoImp::listPais($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    case "ciudad_list":
        $top = $_POST["top"];
        $pag = $_POST["pag"];
        $count = 0;

        $resultado = json_encode(array(
            "list" => CiudadDaoImp::listCiudad($top, $pag, $count),
            "count" => ($top > 0 ) ? ceil($count / $top) : $count
        ));
        break;
    
    case "deleteCentro":
        $centrocosto = new Centrocosto();
        $centrocosto->ID = $_POST["id"];
        CentrocostoDaoImp::delete($centrocosto);
        break;
    case "deletePais":
        $pais = new Pais();
        $pais->ID = $_POST["id"];
        PaisDaoImp::delete($pais);
        break;
    case "deleteCiudad":
        $ciudad = new Ciudad();
        $ciudad->ID = $_POST["id"];
        CiudadDaoImp::delete($ciudad);
        break;
}

echo $resultado;
