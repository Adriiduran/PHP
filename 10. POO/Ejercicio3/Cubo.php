<?php 
    class Cubo{
        private $capacidad;
        private $contenido;

        public function __construct($capacidad,$contenido)
        {
            $this->capacidad = $capacidad;
            $this->contenido = $contenido;
        }

        public function getCapacidad(){
            return $this->capacidad;
        }

        public function getContenido(){
            return $this->contenido;
        }

        function verter($objeto){
            if ($objeto->contenido == $objeto->capacidad) {
                echo "El cubo al que intentas verter está lleno";
            }
            else if ($this->contenido == 0) {
                echo "El cubo no tiene contenido para poder verter";
            }
            else{
                if ($this->contenido + $objeto->contenido > $objeto->capacidad) {
                    $objeto -> contenido = $objeto -> capacidad;
                    
                    if ($this-> contenido > $objeto -> contenido) {
                        $this -> contenido -=   $objeto -> contenido;
                    }
                    else{
                        $this -> contenido = $objeto -> contenido - $this-> contenido;
                    }
                }
                else{
                    $this-> contenido = 0;
                    $objeto -> contenido += $this-> contenido;
                }
            }
        }
    }
?>