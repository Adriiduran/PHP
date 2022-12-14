<?php 
    include_once '../Model/Articulo.php';

    $articulo = new Articulo($_POST['codigo'],NULL,NULL);
    $articulo->modify($_POST['titulo'],$_POST['contenido']);

    header('Location: ../index.php');
?>