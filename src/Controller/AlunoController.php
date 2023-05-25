<?php
   require_once 'src/Model/Pautas.php';

 class AlunoController{



      public function index(){
      $resultado = Pautas::MostrarPautas();

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('aluno.html');

      $array = count($resultado); 
      
      for($i = 0; $i <= $array; $i++){
      $pautas['pautas'] = $resultado[$i]->turma;
      }

      var_dump($pautas);
      $conteudo = $template->render($pautas);
      echo $conteudo;

     }

}

?>