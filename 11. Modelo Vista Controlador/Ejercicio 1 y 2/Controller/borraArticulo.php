<?php 
    require_once '../Model/Articulo.php'; 
    $articuloAux = new Articulo($_GET['codigo'],$_GET['titulo'],$_GET['contenido']); 
    $articuloAux->delete();  
    header("Location: ../index.php")
?>