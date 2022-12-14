<?php
  require_once '../Model/Producto.php';
  $articuloAux = new Producto($_POST['codigo'],null,null,null);
  $articuloAux->reponer($_POST['stock']);
  header("Location: index.php");