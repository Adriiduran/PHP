<?php
  require_once '../Model/Producto.php';

  // Obtiene todas los productos
  $data['productos'] = Producto::getProductos();

  // Carga la vista de listado
  include '../View/listadoProducto.php';