<?php 
    include_once 'Vehiculo.php';
    class Bicicleta extends Vehiculo{
        public function __construct($kilometros,$marca,$color)
        {
            parent::__construct($kilometros,$marca,$color);
        }

        public function anda(){
            return "La bicicleta anda<br>";
        }

        public function caballito(){
            return "Haciendo el caballito<br>";
        }
    }
?>