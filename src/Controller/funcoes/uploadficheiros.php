<?php

    class Upload
    {
        private $formato = array("pdf");
        // private $dataHoraAtual = date('Y-m-d H:i:s');
        
        public function bilhete($file): bool
        {

            $extensao = pathinfo($file['docBI']['name'], PATHINFO_EXTENSION);

            if(in_array($extensao, $this->formato)) 
            {
                $pasta      = "src/public/arquivosInscricacao/";
                $temporario = $file['docBI']['tmp_name'];
                // $novoNome   = $this->dataHoraAtual.".$extensao";
                $novoNome   = uniqid().".$extensao";

                if(move_uploaded_file($temporario, $pasta.$novoNome))
                {
                    return true;
                } else 
                {
                    return false;
                }

            } else
                {
                    return false;
                }
        }

        public function certificado($file): bool
        {
            $extensao = pathinfo($file['docCert']['name'], PATHINFO_EXTENSION);

            if(in_array($extensao, $this->formato)) 
            {
                $pasta      = "src/public/arquivosInscricacao/";
                $temporario = $file['docCert']['tmp_name'];
                // $novoNome   = $this->dataHoraAtual.".$extensao";
                $novoNome   = uniqid().".$extensao";

                if(move_uploaded_file($temporario, $pasta.$novoNome))
                {
                    return true;
                } else 
                {
                    return false;
                }

            } else
                {
                    return false;
                }
        }

        public function files($file): void
        {
            $quantidade = count($file['arquivo']['name']);
            $contador   = 0;

        while($contador < $quantidade) 
        {
            $extensao   = pathinfo($file['arquivo']['name'][$contador], PATHINFO_EXTENSION);
            if( in_array($extensao, $this->formato)) 
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