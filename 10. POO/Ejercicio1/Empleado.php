<?php 
    class Empleado{
        private $nombre;
        private $sueldo;

        public function __construct($nombre,$sueldo){
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        function asigna($n,$s){
            if ($this->nombre == $n) {
                $this->sueldo = $s;
            }
        }

        function impuestos(){
            if ($this->sueldo > 3000) {
                echo $this->nombre . " tiene que pagar impuestos<br>";
            }
            else{
                echo $this->nombre . " no tiene que pagar impuestos<br>";
            }
        }
    }
?>