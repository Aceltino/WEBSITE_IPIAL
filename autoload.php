<?php
spl_autoload_register( 

    function(string $nome_Classe)
    {
        require_once "src/Controller/$nome_Classe.php";
    }

);

?>