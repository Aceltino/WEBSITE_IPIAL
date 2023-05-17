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

        public function int($numero):bool
        {
            filter_var($numero, FILTER_VALIDATE_INT) !== false;
            if ($numero) 
            {
            return true;
            } else {
            return false;
            }
        }

    }

?>