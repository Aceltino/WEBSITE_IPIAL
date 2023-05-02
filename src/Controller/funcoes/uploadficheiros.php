<?php

    abstract class Upload
    {
        private static $formato = array("pdf");

        public static function file($file): bool
        {
            $extensao = pathinfo($file['arquivo']['name'], PATHINFO_EXTENSION);

            if( in_array($extensao, self::$formato)) 
            {
                $pasta      = "../../public/arquivosInscricacao/";
                $temporario = $file['arquivo']['tmp_name'];
                $novoNome   = uniqid().".$extensao";

                if(move_uploaded_file($temporario, $pasta.$novoNome))
                {
                    return true;
                } else 
                {
                    throw new Exception ("Não foi possível carregar o ficheiro, tente novamente.");
                }

            } else
            {
                throw new Exception ("Formato inválido, só aceitamos arquivo do tipo 'PDF'.");
            }
                    
        }

        public static function files($file): void
        {
            
            $quantidade = count($file['arquivo']['name']);
            $contador   = 0;

        while($contador < $quantidade) 
        {
            $extensao   = pathinfo($file['arquivo']['name'][$contador], PATHINFO_EXTENSION);
            if( in_array($extensao, self::$formato)) 
            {
            $pasta      = "../../public/arquivosInscricacao/";
            $temporario = $file['arquivo']['tmp_name'][$contador];
            $novoNome   = uniqid().".$extensao";

            if(move_uploaded_file($temporario, $pasta.$novoNome))
            {
                $mensagem[$contador] = "Ficheiro carregado com sucesso!";
            } else 
            {
                $mensagem[$contador] = "Não foi possível carregar o ficheiro, tente novamente.";
            }

            } else
            {
                $mensagem[$contador] = "Formato inválido, só aceitamos arquivo do tipo 'PDF'.";
            }   
                
            $contador++;          
        }
    }
        
    }




?>