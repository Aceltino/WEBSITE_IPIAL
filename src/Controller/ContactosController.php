<?php

 class ContactosController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('contactos.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

}

?>