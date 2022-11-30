<?php 
    include_once 'Vehiculo.php';

    class Coche extends Vehiculo{
        public function __construct($kilometros,$marca,$color)
        {
            parent::__construct($kilometros,$marca,$color);
        }

        public function anda(){
            return "El coche anda<br>";
        }

        public function quemaRueda(){
            return "El coche quema rueda<br>";
        }
    }
?>