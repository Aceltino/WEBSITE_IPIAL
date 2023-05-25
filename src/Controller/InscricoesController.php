<?php

 class InscricoesController{

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


 }

 ?>