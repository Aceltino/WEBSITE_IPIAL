<?php

   require_once 'src/Controller/funcoes/Trait-validacoes.php';
   require_once 'src/Controller/funcoes/uploadficheiros.php';
   require_once 'src/Model/Pautas.php';
   require_once 'src/Controller/funcoes/Criptografia.php';


 class PautasController{
         use Validar;

    public function index(){
      $resultado = Pautas::MostrarPautas();

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('pauta-admin.html');

      $resultado = array();

      $pautas['pautas'] = $resultado;

      $conteudo = $template->render($pautas);
      echo $conteudo;

     }

     public function Cadastrar(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('publicar-pauta.html');

      if(isset($_POST['btn_publicar']))
      {
        $resultado = $this->validarPauta($_POST, $_FILES);
        $parametro['resultado'] = $resultado;
        $conteudo = $template->render($parametro);
        echo $conteudo;
      }
      $conteudo = $template->render();
      echo $conteudo;

     }

     public function EliminarPauta($parametro)
      {

        $id = Criptografia::Descriptografar($parametro[0]);
        $resultado = Pautas::EliminarPauta($id);
        var_dump($resultado);
        if($resultado == true)
        {
          header("location:http://localhost/ipial-alda-lara/pautas");
        } else 
        {
          $resultado = "Pauta não eliminado.";
        }

      }
     public function validarPauta($input, $files)
     {
      if(!empty($input['curso']) && !empty($input['classe']) && !empty($input['turno']) && 
        !empty($input['turma']) ) 
      {

               $upload = new Upload();

               $curso  = $this->input($input['curso']);
               $classe = $this->input($input['classe']);
               $turno  = $this->input($input['turno']);
               $turma  = $this->input($input['turma']);

              $resultado = $upload->pauta($files);
               if($resultado == false)
               {
                 return $resultado = "Ficheiro não carregado (Bilhete de identidade)";
               } else 
               {
                $dados_pauta = 
                    [
                      "curso" => $curso,
                      "classe" => $classe,
                      "turno" => $turno,
                      "turma" => $turma,
                      "ficheiro" => $resultado
                    ];
                  
                $resultado = Pautas::PublicarPauta($dados_pauta);
                    
                if($resultado == true)
                {
                  return $resultado = "Pauta postada com sucesso!";
                } else
                {
                  return $resultado = "Ups! Tente novamente, fica atento nos dados que introduzes.";
                }
               }
     }



    }
 }
?>