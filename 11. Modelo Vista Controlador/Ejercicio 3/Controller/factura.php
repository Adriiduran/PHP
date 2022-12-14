<?php
  require_once '../Model/Cesta.php';
  $conexion = TiendaDB::connectDB();

  // Obtiene todas los productos
  $data['productosCesta'] = cesta::getProductosCesta();
  include '../Controller/escribirFactura.php';

  header("Location: ../View/formularioFactura.php");