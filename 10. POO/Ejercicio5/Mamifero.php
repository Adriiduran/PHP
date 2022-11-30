<?php 
    include_once 'Animal.php';

    class Mamifero extends Animal{

        public function __construct($sexo,$especie)
        {
            parent::__construct($sexo,$especie);
        }
        public function parir(){
            return "Estoy teniendo un bebe";
        }
        public function dormir(){
            return "Estoy durmiendo en el suelo" . parent::duerme();
        }
        public function comer(){
            return "Estoy comiendo algo que me he encontrado por ahi".parent::comer();
        }
    }
?>