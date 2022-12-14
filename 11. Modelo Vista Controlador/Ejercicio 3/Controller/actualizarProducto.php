<?php
  require_once '../Model/Producto.php';

  // actualiza el articulo en la base de datos
  $articuloAux = new Producto($_POST['codigo'], $_POST['nombre'],$_POST['precio'], $_POST['stock']);
  $articuloAux->update();
  header("Location: index.php");
?>