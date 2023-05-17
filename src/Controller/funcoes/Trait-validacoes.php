<?php
    trait Validar
    {
        
        public function input($var):mixed
        {
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

    }

?>