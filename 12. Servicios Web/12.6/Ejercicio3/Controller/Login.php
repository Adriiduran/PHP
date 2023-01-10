<?php 
    include_once '../Model/Cliente.php';
    session_start();

    if (isset($_SESSION['cliente'])) {
        include '../View/formularioPeticion.php';
    }
    else if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $token = $_POST['token'];

        if (Cliente::comprobarLogin($nombre,$token) == true) {
            $_SESSION['cliente'] = serialize(new Cliente($nombre,$token));
            include '../View/formularioPeticion.php';
        }
        else{
            header("Location: ../View/LoginFallido.php");
        }
    }
