<?php
require_once 'src/database/database.php';

class Informacoes 
{
    private static $database;
    private static $pdo;
    private static $sql;

    public static function PublicarNoticia($dados):bool
    {
        $dataHoraAtual = date('Y-m-d H:i:s');
        
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="INSERT INTO tbl_informacoes(titulo, conteudo, data_publicacao, id_usuario) VALUES(?,?,?,'1')";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1, $dados["titulo"]);
        self::$sql->bindValue(2, $dados["conteudo"]);
        self::$sql->bindValue(3, $dataHoraAtual);
        $result = self::$sql->execute();
    
        if($result == 0){
            return false;
        }
         return true;

    }

    public static function MostrarNoticias()
    {
        
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="SELECT * FROM tbl_informacoes";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->execute();
    
        while($row = self::$sql->fetchObject('Informacoes')){
            $result[] = $row; 
        }
        if(!$result){
            return $result = "Nenhum registro no banco.";
        } else {
            return $result;
        }

    }

    public static function MostrarNoticia($parametro)
    {
        $id = intval($parametro);

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        self::$sql ="SELECT * FROM tbl_informacoes WHERE id_informacao =?";      
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1 ,$id, PDO::PARAM_INT);
        self::$sql->execute();
        
        $result = null;
        while($row = self::$sql->fetchObject('Informacoes')){
            $result[] = $row; 
        }

        if(!$result){
            return $result = "Este registro não existe no banco de dados";
        } else {
            return $result;
        }

    }

    public static function AtualizarNoticia($parametro)
    {
        var_dump($parametro);
        $id = intval($parametro['id']);

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="UPDATE tbl_informacoes SET tbl_informacoes.conteudo = ?, 
        tbl_informacoes.titulo = ?
        WHERE tbl_informacoes.id_informacao = ?";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1 ,$parametro['conteudo']);
        self::$sql->bindValue(2 ,$parametro['titulo']);
        self::$sql->bindValue(3 ,$id, PDO::PARAM_INT);
        $result = self::$sql->execute();

        if($result == 0){
            return false;
        } else {
            return true;
        }
    }

    public static function EliminarNoticia($parametro)
    {
        var_dump($parametro);
        $id = intval($parametro);

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="DELETE FROM tbl_informacoes WHERE id_informacao = ?";
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