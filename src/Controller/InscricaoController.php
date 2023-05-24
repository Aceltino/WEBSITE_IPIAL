<?php
   require_once 'src/Controller/funcoes/Trait-validacoes.php';
   require_once 'src/Controller/funcoes/uploadficheiros.php';

 class InscricaoController{
         use Validar;

         private $nome;private $pai;private $mae;private $data;private $sexo;
         private $bi;private $tel;private $email;private $escola;private $turno;
         private $processo;private $opcao1;private $opcao2;private $opcao3;private $opcao4;
         private $docBI;private $docCert;
   
         public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('src/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('inscricao.html');

            if(isset($_POST['btnSubmeter']) ){
               $resultado = $this->validarInscricao($_POST, $_FILES);
               $parametro['resultado'] = $resultado[0];
               $conteudo = $template->render($parametro);
               echo $conteudo;
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
      
         public function validarInscricao($input, $files):array
         {
               
               if($input['nome'] !== null && $input['pai'] !== null && $input['mae'] !== null && 
               $input['data'] !== null && $input['sexo'] !== null && $input['bi'] !== null && 
               $input['tel'] !== null && $input['email'] !== null && $input['escola'] !== null && 
               $input['turno'] !== null &&  $input['processo'] !== null && $input['opcao1'] !== null && 
               $input['opcao2'] !== null && $input['opcao3'] !== null && $input['opcao4'] !== null
               ) 
               {

               $upload    = new Upload();
               $resultado = array();
               
               $this->nome      = $this->input($input['nome']);
               $this->pai       = $this->input($input['pai']);
               $this->mae       = $this->input($input['mae']);
               $this->data      = $this->input($input['data']);
               $this->sexo      = $this->input($input['sexo']);
               $this->bi        = $this->input($input['bi']);
               $this->tel       = $this->input($input['tel']);
               $this->email     = $this->input($input['email']);
               $this->escola    = $this->input($input['escola']);
               $this->turno     = $this->input($input['turno']);
               $this->processo  = $this->input($input['processo']);
               $this->opcao1    = $this->input($input['opcao1']);
               $this->opcao2    = $this->input($input['opcao2']);
               $this->opcao3    = $this->input($input['opcao3']);
               $this->opcao4    = $this->input($input['opcao4']);

               if( $this->email($input['email']) == false )
               {
                  $resultado[] = "Este email não é válido, preencha correctamente o email.";
               } else if ( $this->nome($input['nome']) == false || $this->nome($input['pai']) == false || $this->nome($input['mae']) == false)
               {
                  $resultado[] = "Os teus nomes devem iniciar com a letra maiuscula.";
               } else if ( $this->bilhete($input['bi']) == false)
               {
                  $resultado[] = "O número do bilhete deve conter 14 digitos, não deve conter caracteres especiais nem letras minusculas";
               } else if ( $this->telefone($input['tel']) == false)
               {
                  $resultado[] = "Deve conter apenas numero inteiro, e deve ter apenas 9 digitos.";
               } else if ( $this->inteiro($input['processo']) == false)
               {
                  $resultado[] = "Deve conter apenas numero inteiro.";
               } else if ($upload->bilhete($files) == false)
               {
                  $resultado[] = "Ficheiro não carregado (Bilhete de identidade)";
               } 
               else $resultado[] = ($upload->certificado($files) == false) ? "Ficheiro não carregado (Certificado)" : "Candidatura enviada...";

               } else {
                  $resultado[] = "Preencha todos os campos.";
               }
            return $resultado;
         }
      

}

?>