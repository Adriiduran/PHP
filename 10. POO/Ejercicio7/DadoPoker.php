<?php 
    class DadoPoker{
        private static $tiradasTotales = 0;

        private $caras = ["As","K","Q","J",7,8];
        private $ultimaTirada = "";

        public function __construct()
        {
            $this->caras;
            $this->ultimaTirada;
        }

        public function tira(){
            $aleatorio = rand(0,5);
            DadoPoker::$tiradasTotales++;
            $this->ultimaTirada = $this->caras[$aleatorio];

            return "Ha salido: " . $this->caras[$aleatorio]."<br>";
        }

        public function nombreFigura(){

            return "La última tirada del dado ha sido ".$this->ultimaTirada;
        }

        public static function getTiradasTotales(){
            return DadoPoker::$tiradasTotales;
        }
    }
?>