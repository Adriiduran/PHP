<?php
require_once '../Model/alumno.php';
$data['alumnos'] = Alumno::getAlumnos();

require_once '../Model/alumno-asignatura.php';
    // Obtiene todas las asignaturas
$data['asignaturasMatriculado'] = AlumnoAsignatura::getAsignaturasMatriculado();


$file = "../View/alumnos.txt";
  $escribir="<h1>ALUMNOS</h1>
  <table>
  <tr>
  <th>Matrícula</th>
  <th>Nombre</th>
  <th>Apellidos</th>
  <th>Curso</th>
  <th>Asignaturas</th>
  </tr>";
  $fp = fopen($file, "w");
  fputs($fp, $escribir);

  foreach($data['alumnos'] as $alumno){
    $matricula=$alumno->getMatricula();
    $nombre=$alumno->getNombre();
    $apellidos=$alumno->getApellidos();
    $curso=$alumno->getCurso();
    $texto = "<tr><td>".$matricula."</td><td>".$nombre."</td><td>".$apellidos."</td><td>".$curso."</td><td>";
    fputs($fp, $texto);
    foreach($data['asignaturasMatriculado'] as $asignatura)  {
        if(($asignatura->getMatricula())==$matricula){
            $texto2=$asignatura->getCasignatura().",";
            fputs($fp, $texto2);
        } 
    }
  $texto3="</td></tr>";
  fputs($fp, $texto3);
}
  fputs($fp, '</table>');
  fclose($fp);

  header("Location: ../View/alumnos.php");
?>