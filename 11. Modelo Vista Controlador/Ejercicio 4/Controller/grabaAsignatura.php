<?php 
    include_once '../Model/Asignatura.php';

    $articuloAux = new Asignatura($_POST['nombre']); 
    $articuloAux->insert();  
    
    header("Location: ./mostrarAsignaturas.php");
?>