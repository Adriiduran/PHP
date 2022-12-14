<?php
  require_once '../Model/Cesta.php';

  // Obtiene todas los productos
  $data['productosCesta'] = cesta::getProductosCesta();

  // Carga la vista de listado
  include '../View/listadoCesta.php';