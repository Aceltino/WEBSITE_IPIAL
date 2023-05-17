<?php
   require_once 'src/Controller/funcoes/Trait-validacoes.php';

 class InscricaoController{
         use Validar;

         private $nome;
         private $pai;
         private $mae;
         private $data;
         private $sexo;
         private $bi;
         private $tel;
         private $email;
         private $escola;
         private $turno;
         private $processo;
         private $opcao1;
         private $opcao2;
         private $opcao3;
         private $opcao4;
         private $docBI;
         private $docCert;
   
         public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('src/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('inscricao.html');
            if(isset($_POST['btnSubmeter']) ){
               $this->validarInscricao($_POST);
            } else {
            $conteudo = $template->render();
            echo $conteudo;
            }
         }

         public function Inscrever(){

            $loader = new \Twig\Loader\FilesystemLoader('src/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('inscricao2.html');
            
            $conteudo = $template->render();
            echo $conteudo;
            }
      
         public function validarInscricao($input){
            if($input['nome'] !== null && $input['pai'] !== null && $input['mae'] !== null && 
               $input['data'] !== null && $input['sexo'] !== null && $input['bi'] !== null && 
               $input['tel'] !== null && $input['email'] !== null && $input['escola'] !== null && 
               $input['turno'] !== null &&  $input['processo'] !== null && $input['opcao1'] !== null && 
               $input['opcao2'] !== null && $input['opcao3'] !== null && $input['opcao4'] !== null && 
               $input['foto1'] !== null && $input['foto2'] !== null) {
               
               $this->nome;
               $this->pai;
               $this->mae;
               $this->data;
               $this->sexo;
               $this->bi;
               $this->tel;
               $this->email;
               $this->escola;
               $this->turno;
               $this->processo;
               $this->opcao1;
               $this->opcao2;
               $this->opcao3;
               $this->opcao4;
               $this->docBI;
               $this->docCert;

            }

            var_dump($input);

         }
      

}

?>