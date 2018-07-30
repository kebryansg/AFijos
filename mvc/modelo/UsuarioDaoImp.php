<?php

include_once '../mvc/Controlador/Entidades/Usuario.php';

class UsuarioDaoImp extends ModelProcedure {

    public static function _list($params) {
        $conn = (new C_MySQL())->open();
        $params = array(
            "procedure" => "sp_GetUsuarioDepartamento",
            "params" => json_encode($params)
        );

        // Agregar Vista
        //$sql = "SELECT SQL_CALC_FOUND_ROWS * from viewUsuario limit $top offset $pag ;"; //"limit $top offset $limit"

        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }

    public static function _listUsuariosDepartamento($params) {
        $conn = (new C_MySQL())->open();
        // sp_GetUsuarioDepartamento
        $params = array(
            "procedure" => "sp_GetUsuarioDepartamento",
            "params" => json_encode($params)
        );
        //$sql = "SELECT SQL_CALC_FOUND_ROWS * from viewUsuario limit $top offset $pag ;"; //"limit $top offset $limit"

        $list = C_MySQL::returnListAsoc_Total($conn, $params);
        $conn->close();
        return $list;
    }

    public static function _listUsuariosBodega($id) {
        $conn = (new C_MySQL())->open();
        $sql = "select idbodega from bodegausuario where idusuario = $id;";
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

    public static function _listUsuariosTipoMovimiento($id) {
        $conn = (new C_MySQL())->open();
        $sql = "select idtipomovimiento from tipomovimientousuario where idusuario = $id;";
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $list;
    }

    public static function _login($params) {
        $conn = (new C_MySQL())->open();
        $sql = "select count(*) cant from usuario where  upper('" . $params["user"] . "') = upper(username) and password = encode('" . $params["pass"] . "','afijos');";
        $login = false;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $login = $row["cant"] == 1;
        }
        $conn->close();
        return $login;
    }

    public static function _get($params) {
        $conn = (new C_MySQL())->open();
        //$sql = "select id, username, idrol,(SELECT rol from viewusuario where id = usuario.id) rol from usuario where upper('" . $params["user"] . "') = upper(username) and password = encode('" . $params["pass"] . "','afijos');";
        $sql = "call sp_getUsuarioCredencial('" . json_encode($params) . "');";
        $row = C_MySQL::returnRowAsoc($conn, $sql);
        $conn->close();
        return $row;
    }

    public static function _getUsuario($id) {
        $conn = (new C_MySQL())->open();
        $sql = "select id, username,decode(`password`,'afijos') `password`,idpersona, idrol,estado from usuario where id = " . $id;
        $row = array();
        $row["usuario"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $sql = "select * from persona where id = " . $row["usuario"]["idpersona"];
        $row["persona"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $sql = "select dep.* from usuariodepartamento ud join departamento dep on dep.id = ud.iddepartamento where idusuario = $id and fechafin is null;";
        $row["departamento"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $conn->close();
        return $row;
    }

    public static function changeDepartamento($datos) {
        $conn = (new C_MySQL())->open();
        $sql = "call sp_CambioDepartamento('" . json_encode($datos) . "')";
        $bandera = $conn->query($sql);
        $conn->close();
        return $bandera;
    }

}
