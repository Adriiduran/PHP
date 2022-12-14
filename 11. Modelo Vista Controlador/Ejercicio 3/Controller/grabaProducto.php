<?php
  require_once '../Model/Producto.php';

  // inserta el producto en la base de datos
  $productoAux = new Producto("", $_POST['nombre'], $_POST['precio'], $_POST['stock']);
  $productoAux->insert();
  header("Location: ../Controller/index.php");