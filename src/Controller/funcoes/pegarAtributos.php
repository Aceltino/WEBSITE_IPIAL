<?php
    trait PegarAtributos
    {
        public function __get($nomeatributo)
        {
            $metodo = 'get'. ucfirst($nomeatributo);
            return $this->$metodo;
        }

    }

?>