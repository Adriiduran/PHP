<?php 
    include_once 'Mamifero.php';

    class Gato extends Mamifero{
        private $raza;

        public function __construct($sexo,$especie,$raza){
            $this->raza = $raza;
            parent::__construct($sexo,$especie);
        }

        public function __toString()
        {
            return "Soy un gato de la raza ". $this->raza . parent::__toString();
        }

        public function maullar(){
            return "Miau";
        }

        public function lavarse(){
            return "Me estoy lavando soy un gato";
        }

        public function ronronear(){
            return "Estoy ronroneando soy un gato";
        }
    }
?>