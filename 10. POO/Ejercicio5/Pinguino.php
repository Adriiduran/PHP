<?php 
    include_once 'Ave.php';

    class Pinguino extends Ave{

        public function __construct($sexo,$especie){
            parent::__construct($sexo,$especie);
        }

        public function __toString()
        {
            return "Soy un pinguino " . parent::__toString();
        }

        public function graznar(){
            return "Waa waa wa";
        }

        public function deszilarse(){
            return "Me estoy deslizando por el hielo soy un pinguino";
        }
    }
?>