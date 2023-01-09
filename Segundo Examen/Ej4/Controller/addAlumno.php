<?php
  require_once '../Model/alumno.php';
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/".$_FILES["imagen"]["name"]);
  // inserta el articulo en la base de datos
  $articuloAux = new Alumno($_POST['matricula'],$_FILES["imagen"]["name"] , $_POST['nombre'], $_POST['apellidos'], $_POST['curso']);
  $articuloAux->insert();
  header("Location: index.php");
  ?>