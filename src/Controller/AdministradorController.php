<?php

 class AdministradorController{

    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('index-admin.html');

      $conteudo = $template->render();
      echo $conteudo;

     }

}

?>