<?php

 class InscricaoController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('inscricao.html');

      $conteudo = $template->render();
      echo $conteudo;
     }

     public function Inscrever(){

        $loader = new \Twig\Loader\FilesystemLoader('src/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('inscricao2.html');
  
        $conteudo = $template->render();
        echo $conteudo;
       }

}

?>