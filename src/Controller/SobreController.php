<?php

 class SobreController{

    public function Quem_somos(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('sobre-o-ipial.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

     public function Nossos_Quadros(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('quadros.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

     public function Infraestrutura(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('infraestrutura.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

}



?>