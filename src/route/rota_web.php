<?php

class Rota_web{
  public function pegarURL(){
    
    if(isset($_GET['url']) && $_GET['url'] != null) 
    {
        $control = $_GET['url'];
    } 
    else  
    {
        $control = null;
    }

    $stringUrl = $control;
    $url = explode('/', $stringUrl);

    if($url['0'] == "")
    {
      $controller = 'HomeController';
      $method = 'index';
    }

    if(isset($url['0']) && $url['0'] != null)
    {
        $controller = ucfirst($url['0']).'Controller';
    } else  {
        $controller = 'HomeController';
        
    }
  
    if(!class_exists($controller)) 
    {
        $controller = 'HomeController';
    }

    // var_dump($_GET['url']);
   

    if(isset($url[1]) && $url[1] != null) 
    {
        $method = $url[1];
    } else {
      $controller = 'HomeController';
      $method = 'index';
    }

    if(isset($url[1])){

    if(!method_exists($controller, $url[1]))
    {
      $method = 'index';
    }
   }

    if($url['0'] == "/")
    {
      $controller = 'HomeController';
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