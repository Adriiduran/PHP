<?php
  require_once '../Model/asignatura.php';
  // inserta el articulo en la base de datos
  $articuloAux = new Asignatura('',date('d/m/y h:i:s'), $_POST['nombre']);
  $articuloAux->insert();
  header("Location: muestraAsignaturas.php");
  ?>