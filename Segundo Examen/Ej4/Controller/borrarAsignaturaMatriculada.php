<?php
  require_once '../Model/alumno-asignatura.php';
  $articuloAux = new AlumnoAsignatura($_GET['matricula'],$_GET['asignatura']);
  $articuloAux->delete();
  header("Location: ../View/formularioModificar.php?matricula=$_GET[matricula]&nombre=$_GET[nombre]&apellidos=$_GET[apellidos]&curso=$_GET[curso]");
?>