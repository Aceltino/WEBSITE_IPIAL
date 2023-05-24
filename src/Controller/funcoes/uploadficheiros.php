<?php

    class Upload
    {
        private $formato = array("pdf");
        // private $dataHoraAtual = date('Y-m-d H:i:s');
        
        public function bilhete($file)
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
                    return $novoNome;
                } else 
                {
                    return false;
                }

            } else
                {
                    return false;
                }
        }

        public function certificado($file)
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
                    return  $novoNome;
                } else 
                {
                    return false;
                }

            } else
                {
                    return false;
                }
        }

        public function pauta($file)
        {
            $extensao = pathinfo($file['documento']['name'], PATHINFO_EXTENSION);

            if(in_array($extensao, $this->formato)) 
            {
                $pasta      = "src/public/arquivospautas/";
                $temporario = $file['documento']['tmp_name'];
                // $novoNome   = $this->dataHoraAtual.".$extensao";
                $novoNome   = uniqid().".$extensao";

                if(move_uploaded_file($temporario, $pasta.$novoNome))
                {
                    return $novoNome;
                } else 
                {
                    return false;
                }

            } else
                {
                    return false;
                }
    }
        
    }




?>