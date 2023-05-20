<?php
require_once 'src/Controller/funcoes/Trait-validacoes.php';
require_once 'src/Model/Usuarios.php';
session_start();
class AutenticacaoController{
  
  use Validar;

    private $username;
    private $password;
    public function index(){

      $loader = new \Twig\Loader\FilesystemLoader('src/View');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('login.html');

        if(isset($_POST['btn_Entrar']))
        {
          $resultado = $this->autenticar($_POST);
          $parametro['resultado'] = $resultado;
          $conteudo = $template->render($parametro);
          echo $conteudo;

        } else {
          $conteudo = $template->render();
          echo $conteudo;
        }
     }
     
     public function autenticar($input)
    {
        if(!empty($input['username']) && !empty($input['password']))
        {

          $this->username = $this->input($input['username']);
          $this->password = md5($this->input($input['password']));
          if($this->username($this->username) == true)
          {
            $resultado = "Campo inválido.";
            return $resultado;
          } else {
              $user = [
                "username" => $this->username,
                "password" => $this->password
              ];
            $resultado = Usuarios::dadosUsuario($user);
            
            if($resultado){
              var_dump($resultado);
              $_SESSION['dados_user'] = [
                "id"     => $resultado[0]->id_usuario,
                "nome"   => $resultado[0]->nome_usuario,
                "email"  => $resultado[0]->email,
                "codigo" => $resultado[0]->codigo_rec
              ];
              $_SESSION['logado'] = true;
              header("location:http://localhost/ipial-alda-lara/Administrador");
              exit();
            } else 
            {            
              $resultado = "Dados incorretos, fique atento nos seus dados de acesso.";
              return $resultado;
            }
          }

        }else {
          return $resultado = "Não deve ter campos null.";
        } 
    }

}

?>