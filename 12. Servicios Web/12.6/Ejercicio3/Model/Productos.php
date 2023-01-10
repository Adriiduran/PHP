<?php 
    include_once 'TiendaDB.php';

    class Productos{
        private $nombre;
        private $precio;
        private $imagen;

        public function __construct($nombre,$precio,$imagen)
        {
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->imagen = $imagen;
        }

        public function __toString()
        {
            return $this->nombre.",".$this->precio.",".$this->imagen;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

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

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        public static function listaPorNombre($cadena){
            $conexion = TiendaDB::connectDB();
            $sql = "SELECT nombre,precio,imagen FROM productos WHERE nombre LIKE '%$cadena%'";
            $consulta = $conexion->query($sql);
            $productos = [];

            while ($registro = $consulta->fetchObject()) {
                $producto = new Productos($registro->nombre,$registro->precio,$registro->imagen);
                $productos[] = $producto;
            }

            return $productos;
        }

        public static function listaPorRango($min,$max){
            $conexion = TiendaDB::connectDB();
            $sql = "SELECT nombre,precio,imagen FROM productos WHERE precio >= $min and precio <= $max";
            $consulta = $conexion->query($sql);
            $productos = [];

            while ($registro = $consulta->fetchObject()) {
                $producto = new Productos($registro->nombre,$registro->precio,$registro->imagen);
                $productos[] = $producto;
            }

            return $productos;
        }
    }
?>