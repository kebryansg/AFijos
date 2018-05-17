<?php
include_once '../mvc/Controlador/C_MySQL.php';
include_once '../mvc/Controlador/Entidades/Usuario.php';

class UsuarioDaoImp {
    public static function save($usuario){
        $conn = (new C_MySQL())->open();
        if($usuario->ID == 0){
            $sql = $usuario->Insert();
        }else{
            $sql = $usuario->Update();
        }
        if($conn->query($sql)){
            if ($usuario->ID == 0) {
                $usuario->ID = $conn->insert_id;
            }
        }
        $conn->close();
    }
    
    public static function listUsuarios($top, $pag, &$count){
        $conn = (new C_MySQL())->open();
        // Agregar Vista
        $sql = "SELECT SQL_CALC_FOUND_ROWS * from viewUsuario limit $top offset $pag ;"; //"limit $top offset $limit"
        
        $list = C_MySQL::returnListAsoc($conn, $sql);
        $count = C_MySQL::row_count($conn);
        $conn->close();
        return $list;
    }
    
    public static function delete($usuario){
        $conn = (new C_MySQL())->open();
        $sql = $usuario->Update_Delete();
        $conn->query($sql);
        $conn->close();
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
        $sql = "select id, username, idrol,(SELECT rol from viewusuario where id = usuario.id) rol from usuario where upper('" . $params["user"] . "') = upper(username) and password = encode('" . $params["pass"] . "','afijos');";
        $row = C_MySQL::returnListAsoc($conn, $sql);
        $conn->close();
        return $row[0];
    }
    public static function _getUsuario($id) {
        $conn = (new C_MySQL())->open();
        $sql = "select id, username,decode(`password`,'afijos') `password`,idpersona, idrol,estado from usuario where id = ". $id;
        $row = array();
        $row["usuario"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $sql = "select * from persona where id = ". $row["usuario"]["idpersona"];
        $row["persona"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $sql = "select dep.* from usuariodepartamento ud join departamento dep on dep.id = ud.iddepartamento where idusuario = $id and fechafin is null;";
        $row["departamento"] = (C_MySQL::returnRowAsoc($conn, $sql));
        $conn->close();
        return $row;
    }
    
    public static function changeDepartamento($datos){
        $conn = (new C_MySQL())->open();
        $sql = "call sp_CambioDepartamento('". json_encode($datos) ."')";
        $bandera = $conn->query($sql);
        $conn->close();
        return $bandera;
    }
}





