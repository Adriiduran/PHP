<?php 
    include_once 'HospitalDB.php';

    class Cita{
        private $paciente;
        private $medico;
        private $fecha;
        private $hora;

        public function __construct($paciente,$medico,$fecha,$hora)
        {
            $this->paciente = $paciente;
            $this->medico = $medico;
            $this->fecha = $fecha;
            $this->hora = $hora;
        }

        /**
         * Get the value of paciente
         */ 
        public function getPaciente()
        {
                return $this->paciente;
        }

        /**
         * Set the value of paciente
         *
         * @return  self
         */ 
        public function setPaciente($paciente)
        {
                $this->paciente = $paciente;

                return $this;
        }

        /**
         * Get the value of medico
         */ 
        public function getMedico()
        {
                return $this->medico;
        }

        /**
         * Set the value of medico
         *
         * @return  self
         */ 
        public function setMedico($medico)
        {
                $this->medico = $medico;

                return $this;
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
         * Get the value of hora
         */ 
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Set the value of hora
         *
         * @return  self
         */ 
        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }

        public static function getCitaById($paciente,$medico,$fecha){
            $conexion = HospitalDB::connectDB();
            $sql = "SELECT * FROM cita WHERE paciente='$paciente' AND medico='$medico' AND fecha='$fecha'";
            $consulta = $conexion->query($sql);

            $cita = $consulta->fetchObject();

            if ($cita== "") {
                return false;
            }
            else{
                $resultado = new Cita($cita->getPaciente(),$cita->getMedico(),$cita->getFecha(),$cita->getHora());
                return $resultado;
            }
        }

        public static function citaOcupada($medico,$fecha,$hora){
            $conexion = HospitalDB::connectDB();
            $sql = "SELECT * FROM cita WHERE medico=$medico AND fecha='$fecha' AND hora=$hora";
            $consulta = $conexion->query($sql);

            $cita = $consulta->fetchObject();

            if ($cita == "") {
                return false;
            }
            else{
                return true;
            }
        }

        public function getCitasByPaciente($paciente,$fecha){
            $conexion = HospitalDB::connectDB();
            $sql = "SELECT * FROM cita WHERE paciente='$paciente' AND fecha='$fecha'";
            $consulta = $conexion->query($sql);

            $arrayCitas = [];

            while ($registro = $consulta->fetchObject()) {
                $arrayCitas[] = new Cita($registro->getPaciente,$registro->getMedico(),$registro->getFecha(),$registro->getHora());
            }

        }
    }
?>