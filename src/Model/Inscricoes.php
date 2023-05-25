<?php
require_once 'src/database/database.php';

class Inscricao 
{
    private static $database;
    private static $pdo;
    private static $sql;

    public static function IdCurso($curso)
    {
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();

        $result = array();
        for($i = 1; $i <= 4; $i++){
        self::$sql = "SELECT id_curso FROM tbl_cursos WHERE curso = ?";
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1, $curso[$i]);
        self::$sql->execute();
        
        $result[$i] = self::$sql->fetchObject('Inscricao');
    }
    if(!$result){
        return null;
    }
        return $result;
           
}
    
    public static function CadastrarInscrito($dados)
    {
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
    
        self::$sql = "INSERT INTO tbl_inscricao_aluno(num_BI, nome_completo, nome_pai, nome_mae, 
        sexo, data_nascimento, telefone, nome_escola_antiga,
        turma_antiga, turno_antigo, processo_num_antigo, doc_certificado, doc_bilhete) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1, $dados["bi"]);
        self::$sql->bindValue(2, $dados["nome"]);
        self::$sql->bindValue(3, $dados["pai"]);
        self::$sql->bindValue(4, $dados["mae"]);
        self::$sql->bindValue(5, $dados["sexo"]);
        self::$sql->bindValue(6, $dados["data"]);
        self::$sql->bindValue(7, $dados["tel"]);
        self::$sql->bindValue(8, $dados["escola"]);
        self::$sql->bindValue(9, $dados["turma"]);
        self::$sql->bindValue(10, $dados["turno"]);
        self::$sql->bindValue(11, $dados["processo"]);
        self::$sql->bindValue(12, $dados["certificado"]);
        self::$sql->bindValue(13, $dados["bilhete"]);
    
        self::$sql->execute();
    
        for ($i = 1; $i <= 4; $i++) {
            $idCurso = Inscricao::IdCurso($dados);
        
            if ($idCurso !== null) {
                self::$sql = "INSERT INTO tbl_inscricao_aluno_has_tbl_cursos(inscricao_Aluno_id, Cursos_id, preferencia_curso_inscrito) 
                VALUES((SELECT MAX(id_inscrito) FROM tbl_inscricao_aluno),?,?)";
        
                self::$sql = self::$pdo->prepare(self::$sql);
                self::$sql->bindValue(1, $idCurso[$i]->id_curso);
                self::$sql->bindValue(2, $i);
                self::$sql->execute();
            }
            return true;
        }
    }
    public static function MostrarNoticias()
    {
        
        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        
        self::$sql ="SELECT * 
        FROM tbl_inscricao_aluno
        INNER JOIN tbl_inscricao_aluno_has_tbl_cursos 
        ON tbl_inscricao_aluno.id_inscrito = tbl_inscricao_aluno_has_tbl_cursos.inscricao_Aluno_id
        INNER JOIN tbl_cursos
        ON tbl_inscricao_aluno_has_tbl_cursos.Cursos_id = tbl_cursos.id_curso";
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

    public static function MostrarInscritos()
    {
        $id = intval($parametro);

        self::$database = Database::getInstance();
        self::$pdo = self::$database->getPdo();
        self::$sql ="SELECT * 
        FROM tbl_inscricao_aluno
        INNER JOIN tbl_inscricao_aluno_has_tbl_cursos 
        ON tbl_inscricao_aluno.id_inscrito = tbl_inscricao_aluno_has_tbl_cursos.inscricao_Aluno_id
        INNER JOIN tbl_cursos
        ON tbl_inscricao_aluno_has_tbl_cursos.Cursos_id = tbl_cursos.id_curso
        WHERE tbl_inscricao_aluno.id_inscrito =";      
        self::$sql = self::$pdo->prepare(self::$sql);
        self::$sql->bindValue(1 ,$id, PDO::PARAM_INT);
        self::$sql->execute();
        
        $result = null;
        while($row = self::$sql->fetchObject('Inscricao')){
            $result[] = $row; 
        }

        if(!$result){
            return $result = "Este registro não existe no banco de dados";
        } else {
            return $result;
        }

    }

    // public static function AtualizarNoticia($parametro)
    // {
    //     var_dump($parametro);
    //     $id = intval($parametro['id']);

    //     self::$database = Database::getInstance();
    //     self::$pdo = self::$database->getPdo();
        
    //     self::$sql ="UPDATE tbl_informacoes SET tbl_informacoes.conteudo = ?, 
    //     tbl_informacoes.titulo = ?
    //     WHERE tbl_informacoes.id_informacao = ?";
    //     self::$sql = self::$pdo->prepare(self::$sql);
    //     self::$sql->bindValue(1 ,$parametro['conteudo']);
    //     self::$sql->bindValue(2 ,$parametro['titulo']);
    //     self::$sql->bindValue(3 ,$id, PDO::PARAM_INT);
    //     $result = self::$sql->execute();

    //     if($result == 0){
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    // public static function EliminarNoticia($parametro)
    // {
    //     var_dump($parametro);
    //     $id = intval($parametro);

    //     self::$database = Database::getInstance();
    //     self::$pdo = self::$database->getPdo();
        
    //     self::$sql ="DELETE FROM tbl_informacoes WHERE id_informacao = ?";
    //     self::$sql = self::$pdo->prepare(self::$sql);
    //     self::$sql->bindValue(1 ,$id, PDO::PARAM_INT);
    //     $result = self::$sql->execute();

    //     if($result == 0){
    //         return false;
    //     } else {
    //         return true;
    //     }

    // }
}

?>