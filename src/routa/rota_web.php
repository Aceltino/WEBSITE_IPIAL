<?php

class Rota_web{
  public function pegarURL(){
    
    if(isset($_GET['url']) && $_GET['url'] != null) 
    {
        $control = $_GET['url'];
    } else {
        $control = null;
    }
    $stringUrl = $control;
    $url = explode('/', $stringUrl);

    if(isset($url['0']) && $url['0'] != null)
    {
        $controller = ucfirst($url['0']).'Controller';
    } else  {
        $controller = 'PessoaController';
    }
  
    if(!class_exists('PessoaController')) 
    {
        $controller = 'ErroController';
    }

    var_dump($_GET['url']);
   

    if(isset($url[1]) && $url[1] != null) 
    {
        $method = $url[1];
    } else {
      $controller = 'PessoaController';
      $method = 'index';
    }

    if(!method_exists($controller, $url[1]))
    {
      $method = 'index';
    }

    //---------- PARAMETROS --------

    // if(isset($url[1]) && $url[1] != null) 
    // {
    //     $parametro = $url[1];
    // } else {
    //     $parametro = null;
    // }
    
    call_user_func(array(new $controller, $method)); //, array($parametro) 

     }

}


?>