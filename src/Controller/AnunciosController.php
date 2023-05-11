<?php

 class AnunciosController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('anuncios.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

}

?>