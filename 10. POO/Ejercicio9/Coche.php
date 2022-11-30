<?php 
    class Coche{
        private static $modeloCaro;
        private static $precioCaro;

        public static function getModeloCaro(){
            return self::$modeloCaro;
        }

        public static function getPrecioCaro(){
            return self::$precioCaro;
        }

        public static function masCaro(){
            return "Modelo : ".self::$modeloCaro.", precio: ".self::$precioCaro;
        }

        protected $matricula;
        protected $modelo;
        protected $precio;

        public function __construct($matricula,$modelo,$precio)
        {
            $this->matricula = $matricula;
            $this->modelo = $modelo;
            $this->precio = $precio;

            if ($precio > self::$precioCaro) {
                self::$precioCaro = $precio;
                self::$modeloCaro = $modelo;
            }
        }

        /**
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

                return $this;
        }

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        public function __toString(){
            return "<tr><td>".$this->matricula."</td><td>".$this->modelo."</td><td>".$this->precio."</td><td>No procede</td></tr>";
        }
    }

    class CocheLujo extends Coche{
        private $suplemento;

        public function __construct($matricula,$modelo,$precio,$suplemento){
          parent::__construct($matricula,$modelo,$precio);
          $this->suplemento = $suplemento;  
        }

        public function getPrecio(){
            return $this->precio+$this->suplemento;
        }

        public function __toString(){
            return "<tr><td>".$this->matricula."</td><td>".$this->modelo."</td><td>".$this->precio."</td><td>".$this->suplemento."</td></tr>";
        }
    }
?>