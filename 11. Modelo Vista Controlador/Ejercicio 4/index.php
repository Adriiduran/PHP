<?php 
    require_once './Model/Alumno.php';
        //Obtiene todos los artículos
    $data['alumnos'] = Alumno::getAlumnos(); 
        //Carga la vista del listado
    include './View/listadoAlumnos.php';
?>