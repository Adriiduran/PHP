<?php 
    class Factura{
        private static $IVA = 21;
        private $ImporteBase;
        private $fecha;
        private $estado;
        private $productos = [
            "nombre" => "",
            "precio" => 0,
            "cantidad" => 0
        ];

        public function AñadeProductos($ImporteBase, $fecha, $estado, $productos)
        {
            $this-> ImporteBase = $ImporteBase;
            $this-> fecha = $fecha;
            $this-> estado = $estado;
            $this-> productos = $productos;
        }

        public function ImprimeFactura(){
            echo 'IVA del '. Factura::$IVA . ' con un importe base del ' . $this-> ImporteBase . ' en la fecha ' . $this->fecha . ' el estado de la factura ' . $this->estado . ' el nombre del producto es ' . $this->productos["nombre"] . ' el precio final es de ' . (Factura::$IVA * $this->productos["precio"] * $this->productos["cantidad"]);
        }

        public function getImporteBase()
        {
                return $this->ImporteBase;
        }


        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }
    }
?>