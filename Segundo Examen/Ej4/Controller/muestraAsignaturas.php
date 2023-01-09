<?php
  require_once '../Model/asignatura.php';

  // Obtiene todas las ofertas
  $data['asignaturas'] = Asignatura::getAsignaturas();

  // Carga la vista de listado
  include '../View/listadoAsignaturas.php';
  ?>