<?php
  require_once '../Model/Producto.php';
  require_once '../Model/Cesta.php';

  $articuloAux = new Producto($_GET['codigo'],null,null,null);
  $articuloAux->delete();
  $articuloAux = new Cesta($_GET['codigo'],null,null,null);
  $articuloAux->borrarProducto();
  header("Location: index.php");