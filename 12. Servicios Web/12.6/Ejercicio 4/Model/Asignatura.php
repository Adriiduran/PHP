<?php
include_once "EscuelaDB.php";

class Asignatura
{
    protected $codigo;
    protected $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->codigo = null;
    }

    public function __toString(){
        return $this->nombre.",".$this->codigo;
    }

    public function getcodigo()
    {
        return $this->codigo;
    }

    public function setcodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getnombre()
    {
        return $this->nombre;
    }

    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO asignaturas (nombre) VALUES ('$this->nombre')";
        $conexion->exec($insercion);
        
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM asignaturas WHERE codigo=$this->codigo";
        $conexion->exec($borrado);
        
    }

    public static function getasignaturas()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM asignaturas";
        $consulta = $conexion->query($seleccion);
        $asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $asignatura = new Asignatura($registro->nombre);
            $asignatura->setcodigo($registro->codigo);
            $asignaturas[] = $asignatura;
        }

        return $asignaturas;
        
    }

    public static function getAsignaturasPorAlumno($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT a.nombre,a.codigo FROM asignaturas as a, asignaturasalumno as aa WHERE a.codigo = aa.codigo AND aa.matricula='$matricula'";
        $consulta = $conexion->query($seleccion);
        $asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $asignatura = new Asignatura($registro->nombre);
            $asignatura->setcodigo($registro->codigo);
            $asignaturas[] = $asignatura;
        }

        return $asignaturas;
        
    }
}
