<?php

require_once 'src/Controller/funcoes/Trait-validacoes.php';
require_once 'funcoes/email.php';
 class ContactosController{

   use Validar;

   private $nome;
   private $email;
   private $assunto;
   private $mensagem;

    public function index():void
    {
      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('contactos.html');

      if(isset($_POST['btn_Entrar']))
      {
         $resultado = $this->ValidarInputsEmail($_POST);
         $parametro['resultado'] = $resultado;
         $conteudo = $template->render($parametro);
         echo $conteudo;

      } else {
         $conteudo = $template->render();
         echo $conteudo;
      }

   }
   //   if(empty($inputs['nome']) !== null && empty($inputs['email']) !== null && empty($inputs['assunto']) !== null && empty($inputs['mensagem']) == null)

     public function ValidarInputsEmail($inputs)
     {
            if($inputs['email'] != null)
            {
               $this->email = $this->input($inputs['email']);

               if($this->email($this->email) == false)
               {
                  $resultado = "Este email não é válido, preencha correctamente o email.";
               } else {
                  $resultado = (Email::EnviarEmail($this->email) == true) ? "Recebemos a sua requisição, dê uma olhada no seu email." : "Algo deu errado, tente mais tarde!";
               }
            } else {
               $resultado  = "Preencha todos os campos";
            }
         return $resultado;
     }
}

?>