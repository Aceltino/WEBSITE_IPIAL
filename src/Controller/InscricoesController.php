<?php
  require_once 'src/Model/Inscricoes.php';
  require_once 'src/Controller/funcoes/Criptografia.php';
 class InscricoesController{

    public function index()
    {
        $resultado = Inscricao::MostrarInscritos();

        $loader = new \Twig\Loader\FilesystemLoader('src/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('alunos-admitidos.html');       
        
        if (empty($resultado)){
        $array = count($resultado);
        for ($i = 0; $i < $array; $i++){
          $resultado[$i]->id_inscrito = Criptografia::Criptografar($resultado[$i]->id_inscrito);    // Criptografar o ID
        }
    }
        $inscritos['inscritos'] = $resultado;

        $conteudo = $template->render($inscritos);
        echo $conteudo;
   

    }

    public function VerInscricao($parametro)
    {

      $id = Criptografia::Descriptografar($parametro[0]);
      $resultado = Inscricao::MostrarInscrito($id);
    
      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('dados-do-inscrito.html');
      
      $parametro = array();
      $parametro['nome']  = $resultado[0]->nome_completo;
      $parametro['pai'] = $resultado[0]->nome_pai;
      $parametro['mae'] = $resultado[0]->nome_mae;
      $parametro['data'] = $resultado[0]->data_nascimento;
      $parametro['nbi'] = $resultado[0]->num_BI;
      $parametro['sexo'] = $resultado[0]->sexo;
      $parametro['escola'] = $resultado[0]->nome_escola_antiga;
      $parametro['telefone'] = $resultado[0]->telefone;
      $parametro['turma'] = $resultado[0]->turma_antiga;
      $parametro['turno'] = $resultado[0]->turno_antigo;
      $parametro['processo'] = $resultado[0]->processo_num_antigo;
      $parametro['C1'] = $resultado[0]->curso;

      $conteudo = $template->render($parametro);
      echo $conteudo;

    }

    public function EliminarInscricao($parametro)
      {

        $resultado = Inscricao::EliminarInscritos();
        if($resultado == true)
        {
          header("location:http://localhost/ipial-alda-lara/Inscricoes");
        } else 
        {
          $resultado = "Dados não eliminado.";
        }

      }


 }

 ?>