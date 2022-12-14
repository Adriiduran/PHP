<?php
  require_once '../Model/Cesta.php';

  // inserta el producto en la base de datos
  $productoAux = new Cesta($_GET['codigo'], $_GET['nombre'], $_GET['precio'],1);
  $productoAux->añadir();
  header("Location: ../Controller/indexCesta.php");