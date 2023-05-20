<?php
require_once 'src/database/database.php';

class Usuarios 
{
    private static $database;
    private static $pdo;
    private static $sql;

    public static function dadosUsuario($dados):mixed
    {
        
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="SELECT id_usuario, nome_usuario, email FROM tbl_usuario_autenticacao WHERE palavra_passe=? AND nome_usuario=?";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1, $dados["password"]);
        self::$sql->bindValue(2, $dados["username"]);
        self::$sql->execute();
    
        $result = array();
        while($row = self::$sql->fetchObject('Usuarios')){
            $result[] = $row; 
        }

        // var_dump($result);

         return $result;

        // if(!$result){
        //     return false;
        // } 
            
    }
}

?>