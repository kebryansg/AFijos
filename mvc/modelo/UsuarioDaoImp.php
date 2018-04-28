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
}





