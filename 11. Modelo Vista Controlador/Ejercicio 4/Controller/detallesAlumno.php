<?php
include_once '../Model/Alumno.php';
include_once '../Model/Asignatura.php';

$conexion = EscuelaDB::connectDB();
$seleccion = "SELECT a.nombre,a.codigo FROM asignaturas as a, asignaturasalumno as aa WHERE a.codigo = aa.codigo AND aa.matricula='".$_GET['matricula']."'";
$consulta = $conexion->query($seleccion);
$asignaturas = [];

while ($registro = $consulta->fetchObject()) {
    $asignatura = new Asignatura($registro->nombre);
    $asignatura->setcodigo($registro->codigo);
    $asignaturas[] = $asignatura;
}

$seleccionAlumno = "SELECT * from alumnos where matricula='".$_GET['matricula']."'";
$consulta = $conexion->query($seleccionAlumno);
$registroAlumno = $consulta->fetchObject();


$data['detalleAsignatura'] = $asignaturas;
$data['detalleAlumno'] = new Alumno($registroAlumno->matricula,$registroAlumno->nombre,$registroAlumno->apellidos,$registroAlumno->curso);

include '../View/alumnoAsignatura.php';
?>