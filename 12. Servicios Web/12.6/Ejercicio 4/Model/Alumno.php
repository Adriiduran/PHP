<?php
include_once "EscuelaDB.php";

class Alumno
{
    protected $matricula;
    protected $nombre;
    protected $apellidos;
    protected $curso;

    public function __construct($matricula, $nombre, $apellidos, $curso)
    {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->curso = $curso;
    }

    public function __toString(){
        return $this->matricula.",".$this->nombre.",".$this->apellidos.",".$this->curso;
    }

    public function getmatricula()
    {
        return $this->matricula;
    }

    public function setmatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getnombre()
    {
        return $this->nombre;
    }

    public function setnombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getcurso()
    {
        return $this->curso;
    }

    public function setcurso($curso)
    {
        $this->curso = $curso;
    }

    public function getapellidos()
    {
        return $this->apellidos;
    }

    public function setapellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO alumnos (matricula, nombre, apellidos, curso) VALUES ('$this->matricula' ,'$this->nombre', '$this->apellidos', '$this->curso')";
        $conexion->exec($insercion);
    }

    public static function delete($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumnos WHERE matricula='$matricula'";
        $conexion->exec($borrado);
    }

    public function update($matricula,$nombre,$apellidos,$curso)
    {
        $conexion = EscuelaDB::connectDB();
        $update = "UPDATE alumnos SET matricula='$matricula',nombre='$nombre',apellidos='$apellidos',curso='$curso'";
        $conexion->exec($update);
    }

    public static function getAlumnos()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumnos";
        $consulta = $conexion->query($seleccion);
        $alumnos = [];

        while ($registro = $consulta->fetchObject()) {
            $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            $alumnos[] = $alumno;
        }

        return $alumnos;
    }

    public static function getAlumnosByCurso($curso){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumnos where curso='$curso'";
        $consulta = $conexion->query($seleccion);
        $alumnos = [];

        while ($registro = $consulta->fetchObject()) {
            $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            $alumnos[] = $alumno;
        }

        
        return $alumnos;
    }

    public static function getAlumnosByNombre($nombre){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumnos where nombre like '%$nombre%'";
        $consulta = $conexion->query($seleccion);
        $alumnos = [];

        while ($registro = $consulta->fetchObject()) {
            $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            $alumnos[] = $alumno;
        }

        return $alumnos; 
    }

    public static function matricularAlumno($matricula,$codigo){
        $conexion = EscuelaDB::connectDB();
        $insert = "INSERT INTO asignaturasalumno (matricula,codigo) values ('$matricula',$codigo)";
        $conexion->exec($insert); 
    }

    public static function cambioGrupo($matricula,$grupo){
        $conexion = EscuelaDB::connectDB();
        $insert = "UPDATE alumnos SET curso='$grupo' where matricula='$matricula'";
        $conexion->exec($insert);
    }
}
