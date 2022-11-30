<?php 
    include_once 'Mamifero.php';

    class Perro extends Mamifero{
        private $raza;

        public function __construct($sexo,$especie,$raza){
            $this->raza = $raza;
            parent::__construct($sexo,$especie);
        }

        public function __toString()
        {
            return "Soy un perro de la raza ". $this->raza . parent::__toString();
        }

        public function ladrar(){
            return "Guau";
        }

        public function lamer(){
            return "'Lenguetazo'";
        }
    }
?>