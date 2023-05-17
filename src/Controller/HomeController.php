<?php

require_once 'src/database/database.php';
require_once 'funcoes/email.php';
 class HomeController{
   public function index()
   {
    $database = Database::getInstance();

    // Acesse a conexão PDO
    $pdo = $database->getPdo();

    var_dump($pdo);
    // Email::EnviarEmail();
      // $loader = new \Twig\Loader\FilesystemLoader('src/View');
      // $twig = new \Twig\Environment($loader);
      // $template = $twig->load('index.html');

      // $conteudo = $template->render();
      // echo $conteudo;

  }

}

?>