<?php

 class AutenticacaoController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('login.html');

      $conteudo = $template->render();
      echo $conteudo;
     }
     
}

?>