<?php 
    include_once 'Ave.php';

    class Canario extends Ave{
        private $color;

        public function __construct($sexo,$especie,$color){
            $this->color = $color;
            parent::__construct($sexo,$especie);
        }

        public function __toString()
        {
            return "Soy un canario de color ". $this->color . parent::__toString();
        }

        public function piar(){
            return "Pio Pio";
        }

        public function Cantar(){
            return "Estoy cantando soy un canario";
        }
    }
?>