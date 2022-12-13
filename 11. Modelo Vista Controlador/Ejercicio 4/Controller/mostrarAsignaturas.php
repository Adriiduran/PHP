<?php 
    require_once '../Model/Asignatura.php';
        //Obtiene todos las asignaturas
    $data['asignaturas'] = Asignatura::getasignaturas(); 
        //Carga la vista del listado de asignaturas
    include '../View/listadoAsignaturas.php';
?>