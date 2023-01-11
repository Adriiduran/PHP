<?php 
    include_once '../Model/Productos.php';
    include_once '../Model/Cliente.php';
    session_start();

    $_SESSION['lista'] = "";

    if (isset($_POST['nombre'])) {
        $_SESSION['lista'] = serialize(Productos::listaPorNombre($_POST['nombre']));
    }
    else if (isset($_POST['min'])){
        $_SESSION['lista'] = serialize(Productos::listaPorRango($_POST['min'],$_POST['max']));
    }

    $sesion = unserialize($_SESSION['cliente']);

    $sesion->peticion();

    include '../View/ListaProductos.php';
?>