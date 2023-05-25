<?php
require_once 'src/Controller/funcoes/Trait-validacoes.php';
require_once 'src/Model/Informacoes.php';
require_once 'src/Controller/funcoes/Criptografia.php';

 class NoticiasController{

  use Validar;
   public function index()
      {
          $resultado = Informacoes::MostrarNoticias();

          $loader = new \Twig\Loader\FilesystemLoader('src/View');
          $twig = new \Twig\Environment($loader);
          $template = $twig->load('noticias-admin.html');       

          $array = count($resultado);
          for ($i = 0; $i < $array; $i++){
            $resultado[$i]->id_informacao = Criptografia::Criptografar($resultado[$i]->id_informacao);    // Criptografar o ID
          }

          $publicacoes['publicacoes'] = $resultado;

          $conteudo = $template->render($publicacoes);
          echo $conteudo;
      }

  public function CriarNoticia()
      {

          $loader = new \Twig\Loader\FilesystemLoader('src/View');
          $twig = new \Twig\Environment($loader);
          $template = $twig->load('publicar-informacao.html');

          if(isset($_POST['btn-publicar']))
          {
            $resultado = $this->ValidarNoticia($_POST);
            $parametro['resultado'] = $resultado;
            $conteudo = $template->render($parametro);
            echo $conteudo;

          } else {
            $conteudo = $template->render();
            echo $conteudo;
          }

      }

  public function VerNoticia($parametro)
      {

        $id = Criptografia::Descriptografar($parametro[0]);
        $resultado = Informacoes::MostrarNoticia($id);
      
        $loader = new \Twig\Loader\FilesystemLoader('src/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('informacoes-da-noticia.html');
        
        $parametro = array();
        $parametro['titulo']    = $resultado[0]->titulo;
        $parametro['conteudo'] = $resultado[0]->conteudo;
        $conteudo = $template->render($parametro);
        echo $conteudo;

      }

 public function AtualizarNoticia($parametro)
      {

        $id = Criptografia::Descriptografar($parametro[0]);
        $resultado = Informacoes::MostrarNoticia($id);
       
    
        $loader = new \Twig\Loader\FilesystemLoader('src/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('editar-informacao.html');

          if(isset($_POST['btn_editar']))
          {
            $resultado = $this->ValidarNoticia($_POST);

            if($resultado == false)
            {
            $parametro['resultado'] = $resultado;
            $conteudo = $template->render($parametro);
            echo $conteudo;
            } else
            {
              header("location:http://localhost/ipial-alda-lara/Noticias");
            }
            
          }

        $parametro = array();
        $parametro['titulo']    = $resultado[0]->titulo;
        $parametro['conteudo']  = $resultado[0]->conteudo;
        $parametro['id']        = $resultado[0]->id_informacao;

        $conteudo = $template->render($parametro);
        echo $conteudo;
      }

public function EliminarNoticia($parametro)
      {

        $id = Criptografia::Descriptografar($parametro[0]);
        $resultado = Informacoes::EliminarNoticia($id);

        if($resultado == true)
        {
          header("location:http://localhost/ipial-alda-lara/Noticias");
        } else 
        {
          $resultado = "Comunicado não eliminado.";
        }

      }
  public function ValidarNoticia($input)
      {

        if(!empty($input['titulo']) && !empty($input['conteudo']))
          {

            $nome     = $this->input($input['titulo']);
            $conteudo = $this->input($input['conteudo']);

            

                if(isset($input['id']))
                {
                  $publicacao = [
                      "titulo" => $nome,
                      "conteudo" => $conteudo,
                      "id" => $input['id']
                    ];

                  var_dump($publicacao);

                  $resultado = Informacoes::AtualizarNoticia($publicacao);

                  if($resultado == true){
                    return true;
                  } else {
                    return $resultado = "Dados não atualizados, preencha corretamente as informações.";
                  }

                }
                    $publicacao = [
                      "titulo" => $nome,
                      "conteudo" => $conteudo
                    ];
            $resultado = Informacoes::PublicarNoticia($publicacao);
              if($resultado == true)
              {
                return $resultado = "Informação postada com sucesso!!!";
              } else
              {
                return $resultado = "Ups! Tente novamente, fica atento nos dados que introduzes.";
              }
            
          }

      }

}

?>