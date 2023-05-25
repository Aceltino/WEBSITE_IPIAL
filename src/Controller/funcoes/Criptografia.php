<?php

    class Criptografia
    {
        // Função para criptografar o ID
        public static function Criptografar($id) {
            $encrypted =  base64_encode($id);
            $encrypted = strtr($encrypted, '+/', '-_'); // Substitui "+" por "-" e "/" por "_"
            return $encrypted;
        }

        // Função para descriptografar o ID
        public static function Descriptografar($encrypted) {
            $encrypted = strtr($encrypted, '-_', '+/'); // Desfaz a substituição
            $decrypted = base64_decode($encrypted);
            return $decrypted;
        }

        // Descriptografar o ID
        // $decryptedID = decryptID($encryptedID, $key);
        // echo "ID descriptografado: " . $decryptedID . "\n";

    }
?>
