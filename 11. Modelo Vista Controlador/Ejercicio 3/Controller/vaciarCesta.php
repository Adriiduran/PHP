<?php
  require_once '../Model/Cesta.php';
  $articuloAux = new Cesta(null,null,null,null);
  $articuloAux->vaciar();
  header("Location: index.php");

  