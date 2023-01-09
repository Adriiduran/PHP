<?php

require_once 'EscuelaDB.php';

class Alumno {
  private $matricula;
  private $imagen;
  private $nombre;
  private $apellidos;
  private $curso;
  
  function __construct($matricula, $imagen, $nombre, $apellidos, $curso) {
    $this->matricula = $matricula;
    $this->imagen = $imagen;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->curso = $curso;
  }

  
  public function insert() {
    $conexion = EscuelaDB::connectDB();
    $consultaAsig = $conexion->query("SELECT * from alumnos WHERE matricula=\"".$this->matricula."\"");
    if ($consultaAsig->rowCount() <= 0) { 
      $insercion = "INSERT INTO alumnos (matricula, imagen, nombre, apellidos, curso) VALUES (\"".strtoupper($this->matricula)."\", \"".$this->imagen."\", \"".ucfirst($this->nombre)."\", \"".ucfirst($this->apellidos)."\", \"".$this->curso."\")";
      $conexion->exec($insercion);
    }else{
      header("Location: ../View/yaExiste.php");
    }
    
  }

  /* public function delete() {
    $conexion = EscuelaDB::connectDB();
    $borrado = "DELETE FROM alumnos WHERE matricula=\"".$this->matricula."\"";
    $conexion->exec($borrado);
  } */

  public function update() {
    $conexion = EscuelaDB::connectDB();
    $insercion = "UPDATE alumnos set nombre=\"".$this->nombre."\", apellidos=\"".$this->apellidos."\", curso=\"".$this->curso."\" where matricula=\"".$this->matricula."\"";
    $conexion->exec($insercion);
  }
  
   public static function getAlumnos() {
    $conexion = EscuelaDB::connectDB();
    $seleccion = "SELECT matricula, imagen, nombre, apellidos, curso FROM alumnos";
    $consulta = $conexion->query($seleccion);
    
    $alumnos = [];
    
    while ($registro = $consulta->fetchObject()) {
      $alumnos[] = new Alumno($registro->matricula, $registro->imagen, $registro->nombre, $registro->apellidos, $registro->curso);
    }
   
    return $alumnos;    
  }

  
 /*  public static function getAlumnosByCodigo($codigo) {
    $conexion = EscuelaDB::connectDB();
    $seleccion = "SELECT nombre, apellidos, curso FROM alumnos WHERE matricula=$matricula";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
       
    return $alumno;    
  } */



  /* GETTERS Y SETTERS */
   
  public function getMatricula()
  {
    return $this->matricula;
  }
 
  public function setMatricula($matricula)
  {
    $this->matricula = $matricula;

    return $this;
  }
 
  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  public function getApellidos()
  {
    return $this->apellidos;
  }

  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;

    return $this;
  }
 
  public function getCurso()
  {
    return $this->curso;
  }

  public function setCurso($curso)
  {
    $this->curso = $curso;

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
}