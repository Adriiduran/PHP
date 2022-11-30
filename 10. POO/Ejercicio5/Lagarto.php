<?php 
    include_once 'Animal.php';

    class Lagarto extends Animal{
        public function __construct($sexo,$especie)
        {
            parent::__construct($sexo,$especie);
        }

        public function __toString()
        {
            return "Soy un reptil ". parent::__toString();
        }

        public function tomarElSol(){
            return 'Soy un lagarto estoy tomando el solito';
        }

        public function cazar(){
            return 'Estoy cazando soy un reptil';
        }
    }
?>