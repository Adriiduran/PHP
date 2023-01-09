<?php
  require_once '../Model/alumno-asignatura.php';

  $articuloAux = new AlumnoAsignatura($_POST['matricula'],$_POST['matricularAsignatura']);
  $articuloAux->insert();
  header("Location: ../View/formularioModificar.php?matricula=$_POST[matricula]&nombre=$_POST[nombre]&apellidos=$_POST[apellidos]&curso=$_POST[curso]");
  ?>