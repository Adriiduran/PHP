<?php 
    include_once 'HospitalDB.php';
    class Usuario{
        protected $nombre;
        protected $clave;
        protected $perfil;
        protected $id;


        public function __construct($nombre,$clave,$perfil)
        {
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->perfil = $perfil;
            $this->id = null;
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
         * Get the value of clave
         */ 
        public function getClave()
        {
                return $this->clave;
        }

        /**
         * Set the value of clave
         *
         * @return  self
         */ 
        public function setClave($clave)
        {
                $this->clave = $clave;

                return $this;
        }

        /**
         * Get the value of perfil
         */ 
        public function getPerfil()
        {
                return $this->perfil;
        }

        /**
         * Set the value of perfil
         *
         * @return  self
         */ 
        public function setPerfil($perfil)
        {
                $this->perfil = $perfil;

                return $this;
        }

        public static function getUsuarioByLogin($nombre,$clave){
            $conexion = HospitalDB::connectDB();
            $sql = "SELECT * FROM usuario WHERE nombre='$nombre' AND clave='$clave'";
            $consulta = $conexion->query($sql);

            $usuario = $consulta->fetchObject();

            if ($usuario == "") {
                return false;
            }
            else{
                $resultado = new Usuario($usuario->nombre,$usuario->clave,$usuario->perfil);
                $resultado->setId($usuario->id);
                
                return $resultado;
            }
        }

        public static function getMedicos(){
            $conexion = HospitalDB::connectDB();
            $sql = "SELECT * FROM usuario WHERE perfil='medico'";
            $consulta = $conexion->query($sql);
            
            $arrayMedicos = [];

            while ($registro = $consulta->fetchObject()) {
                $arrayMedicos[] = new Usuario($registro->getNombre(),$registro->getClave(),$registro->getPerfil());
            }

            return $arrayMedicos;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }
?>