<?php 
    require_once '../Model/Alumno.php'; 
    // inserta el alumno en la base de datos 
    $articuloAux = new Alumno($_POST['matricula'], $_POST['nombre'], ($_POST['apellidos']), ($_POST['curso'])); 
    $articuloAux->insert();  
    
    header("Location: ../index.php");
?>