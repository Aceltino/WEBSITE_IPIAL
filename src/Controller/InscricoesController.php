<?php
  require_once 'src/Model/Inscricoes.php';
 class InscricoesController{

    public function index()
    {
        $resultado = Inscricao::MostrarInscritos();

        $loader = new \Twig\Loader\FilesystemLoader('src/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('alunos-admitidos.html');       

        $array = count($resultado);
        for ($i = 0; $i < $array; $i++){
          $resultado[$i]->id_informacao = Criptografia::Criptografar($resultado[$i]->id_informacao);    // Criptografar o ID
        }

        $publicacoes['publicacoes'] = $resultado;

        $conteudo = $template->render($publicacoes);
        echo $conteudo;
    }


 }

 ?>