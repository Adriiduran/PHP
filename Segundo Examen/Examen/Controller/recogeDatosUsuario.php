<?php 
    include_once '../Model/Usuario.php';

    session_start();
    $usuario = unserialize($_SESSION['usuario']);

    if (!isset($_COOKIE[''.$usuario->getNombre().''])) {
        setcookie(''.$usuario->getNombre().'', 0, time() + (86400 * 24 * 365), "/");
        header('Refresh: 0 url=#');
    }
    else{
        $valor = $_COOKIE[''.$usuario->getNombre().''];
        setcookie(''.$usuario->getNombre().'', $valor+1, time() + (86400 * 24 * 365), "/");
    }


    include '../View/vistaPaciente.php';
?>