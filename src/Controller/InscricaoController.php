<?php
   require_once 'src/Controller/funcoes/Trait-validacoes.php';
   require_once 'src/Controller/funcoes/uploadficheiros.php';
   require_once 'src/Model/Inscricoes.php';

 class InscricaoController{
         use Validar;

         public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('src/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('inscricao.html');

            if(isset($_POST['btnSubmeter']) ){
               $resultado = $this->validarInscricao($_POST, $_FILES);
               $parametro['resultado'] = $resultado;
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
      
         public function validarInscricao($input, $files)
         {
               
               if($input['nome'] !== null && $input['pai'] !== null && $input['mae'] !== null && 
               $input['data'] !== null && $input['sexo'] !== null && $input['bi'] !== null && 
               $input['tel'] !== null && $input['escola'] !== null && !empty($input['turma']) &&
               $input['turno'] !== null &&  $input['processo'] !== null && $input['opcao1'] !== null && 
               $input['opcao2'] !== null && $input['opcao3'] !== null && $input['opcao4'] !== null
               ) 
               {

               $upload    = new Upload();
               $resultado = array();
               
               $nome      = $this->input($input['nome']);
               $pai       = $this->input($input['pai']);
               $mae       = $this->input($input['mae']);
               $data      = $this->input($input['data']);
               $sexo      = $this->input($input['sexo']);
               $bi        = $this->input($input['bi']);
               $tel       = $this->input($input['tel']);
               $escola    = $this->input($input['escola']);
               $turma     = $this->input($input['turma']);
               $turno     = $this->input($input['turno']);
               $processo  = $this->input($input['processo']);
               $opcao1    = $this->input($input['opcao1']);
               $opcao2    = $this->input($input['opcao2']);
               $opcao3    = $this->input($input['opcao3']);
               $opcao4    = $this->input($input['opcao4']);

               $bilhete = $upload->bilhete($files);
               $certificado = $upload->certificado($files);

               if ( $this->nome($nome) == false || $this->nome($pai) == false || $this->nome($mae) == false)
               {
                  $resultado[] = "Os teus nomes devem iniciar com a letra maiuscula.";
               } else if ( $this->bilhete($bi) == false)
               {
                  $resultado[] = "O número do bilhete deve conter 14 digitos, não deve conter caracteres especiais nem letras minusculas";
               } else if ( $this->telefone($tel) == false)
               {
                  $resultado[] = "Deve conter apenas numero inteiro, e deve ter apenas 9 digitos.";
               } else if ( $this->inteiro($processo) == false)
               {
                  $resultado[] = "Deve conter apenas numero inteiro.";
               } else if ($bilhete == false)
               {
                  $resultado[] = "Ficheiro não carregado (Bilhete de identidade)";
               } else if ($certificado == false)
               {
                  $resultado[] = "Ficheiro não carregado (Certificado)";
               } else{
                     $inscrito = [
                        "nome"      => $nome,
                        "pai"       => $pai,
                        "mae"       => $mae,
                        "data"      => $data,
                        "sexo"      => $sexo,
                        "bi"        => $bi,
                        "tel"       => $tel,
                        "escola"    => $escola,
                        "turma"     => $turma,
                        "turno"     => $turno,
                        "processo"  => $processo,
                        "1"    => $opcao1,
                        "2"    => $opcao2,
                        "3"    => $opcao3,
                        "4"    => $opcao4,
                        "bilhete"   => $bilhete,
                        "certificado" => $certificado
                     ];

                     $resultado = Inscricao::CadastrarInscrito($inscrito);
                     if($resultado == true){
                        return $resultado = "Candidatura enviada com sucesso...";
                     }
               } 

               } else {
                  $resultado[] = "Preencha todos os campos.";
               }
            return $resultado;
         }
      

}

?>