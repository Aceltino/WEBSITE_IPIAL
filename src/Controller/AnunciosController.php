<?php

require_once 'src/Model/Informacoes.php';
require_once 'src/Controller/funcoes/Criptografia.php';

 class AnunciosController{

  public function index()
  {
      $resultado = Informacoes::MostrarNoticias();

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('anuncios.html');       

      if(!empty($resultado)){
      $array = count($resultado);
      for ($i = 0; $i < $array; $i++){
        $resultado[$i]->id_informacao = Criptografia::Criptografar($resultado[$i]->id_informacao);    // Criptografar o ID
      }
    }
      
      $publicacoes['publicacoes'] = $resultado;
      $publicacoes['titulo'] = $resultado[0]->titulo;
      $publicacoes['data'] = $resultado[0]->data_publicacao;
      $publicacoes['conteudo'] = $resultado[0]->conteudo;

      $conteudo = $template->render($publicacoes);
      echo $conteudo;
  }

  public function VerNoticia($parametro)
  {

    $resultado = Informacoes::MostrarNoticias();

    $id = Criptografia::Descriptografar($parametro[0]);
    $idd = intval(Informacoes::MostrarNoticia($id));

    $loader = new \Twig\Loader\FilesystemLoader('src/View');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('anuncios1.html');
    
    $parametro = array();
    $publicacoes['publicacoes'] = $resultado;
    $publicacoes['titulo']    = $resultado[$idd]->titulo;
    $publicacoes['data'] = $resultado[0]->data_publicacao;
    $publicacoes['conteudo'] = $resultado[$idd]->conteudo;
    $conteudo = $template->render($publicacoes);
    echo $conteudo;

  }

}

?>