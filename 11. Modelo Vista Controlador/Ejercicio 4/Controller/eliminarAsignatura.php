<?php 
    include_once '../Model/Asignatura.php';

    $asignatura = new Asignatura($_GET['nombre']);
    $asignatura->setcodigo($_GET['codigo']);
    $asignatura->delete();

    header('Location: ./mostrarAsignaturas.php');
?>