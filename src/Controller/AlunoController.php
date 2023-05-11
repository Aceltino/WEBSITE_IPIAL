<?php

 class AlunoController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('aluno.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

}

?>