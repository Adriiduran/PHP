<?php 
    require_once '../Model/Articulo.php'; 
    // inserta la oferta en la base de datos 
    $articuloAux = new Articulo($_POST['codigo'], $_POST['titulo'], htmlspecialchars($_POST['contenido'])); 
    $fecha = date('Y-m-d');
    $articuloAux->setFecha($fecha);
    $articuloAux->insert();  
    
    header("Location: ../index.php");
?>