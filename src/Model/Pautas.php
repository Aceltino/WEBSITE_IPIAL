<?php
require_once 'src/database/database.php';

class Pautas 
{
    private static $database;
    private static $pdo;
    private static $sql;

    public static function PublicarPauta($dados):bool
    {

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="INSERT INTO tbl_pauta_turma(turma, classe, curso, doc, turno, id_usuario) VALUES(?,?,?,?,?,'1')";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1, $dados["turma"]);
        self::$sql->bindValue(2, $dados["classe"]);
        self::$sql->bindValue(3, $dados["curso"]);
        self::$sql->bindValue(4, $dados["ficheiro"]);
        self::$sql->bindValue(5, $dados["turno"]);

        $result = self::$sql->execute();
        
        

        if($result == 0){
            return false;
        }
         return true;

    }

    public static function MostrarPautas()
    {
        
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="SELECT * FROM tbl_pauta_turma";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->execute();
        
        $result = array();
        while($row = self::$sql->fetchObject('Pautas')){
            $result[] = $row; 
        }
        if(!$result){
            return $result = "Nenhum registro no banco.";
        } else {
            return $result;
        }

    }

    public static function EliminarPauta($parametro)
    {
        var_dump($parametro);
        $id = intval($parametro);

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="DELETE FROM tbl_pauta_turma WHERE id_pauta = ?";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1 ,$id, PDO::PARAM_INT);
        $result = self::$sql->execute();

        if($result == 0){
            return false;
        } else {
            return true;
        }

    }
}

?>