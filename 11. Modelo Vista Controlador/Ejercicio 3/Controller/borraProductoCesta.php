<?php
  require_once '../Model/Cesta.php';
  $articuloAux = new Cesta($_GET['codigo'],null,null,null);
  $articuloAux->delete();
  header("Location: indexCesta.php");