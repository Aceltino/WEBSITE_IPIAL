<?php
    trait Validar
    {
        
        public function input($var):mixed
        {
            filter_input(INPUT_POST, $var);
            filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
            addslashes($var);

            return $var;
        }
        public function email($email):bool
        {
            filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
            if ($email) 
            {
            return true;
            } else {
            return false;
            }

        }

        public function telefone($numero):bool
        {
            $ExpresRegName = "/^([9][0-9]{8})$/";
            filter_var($numero, FILTER_VALIDATE_INT) !== false;
            if ($numero || preg_match($ExpresRegName, $numero) ) 
            {
            return true;
            } else {
            return false;
            }
        }

        public function pegarString($var)
        {
            $teste ="Angola ";
            $test = strlen($teste);

            $letter = array();

            for($i=0; $i<=$test; $i++){

            $var = substr($teste, $i, 1);
            $letter[$i] = $var;
            }

        }

        public function nome($nome):bool
        {
        $ExpresRegName = "/^[A-Z][a-zA-ZÀ-ÖØ-öø-ÿ]+(?:\s[a-zA-ZÀ-ÖØ-öø-ÿ]+)+$/";

            if (preg_match($ExpresRegName, $nome)) 
            {
            return true;
            } else {
            return false;
            }
        }

        public function bilhete($BI):bool
        {

        $ExpresRegBI = "/^([0-9-A-Z]{14})$/";
            if (preg_match($ExpresRegBI, $BI)) 
            {
            return true;
            } else {
            return false;
            }
        }

        public function inteiro($inteiro):bool
        {
            filter_var($inteiro, FILTER_VALIDATE_INT) !== false;
            if ( $inteiro ) 
            {
            return true;
            } else {
            return false;
            }
        }

        public function username($username):bool
        {

        $ExpresReg = "/^([a-z-0-9]{24})$/";
            if(preg_match($ExpresReg, $username)) 
            {
            return true;
            } else {
            return false;
            }
        }



    }

?>