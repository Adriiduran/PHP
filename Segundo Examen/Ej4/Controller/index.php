<?php
  require_once '../Model/alumno.php';

  // Obtiene todas las ofertas
  $data['alumnos'] = Alumno::getAlumnos();

  // Carga la vista de listado
  include '../View/listado.php';
  ?>