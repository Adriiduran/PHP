<?php 
    include_once '../Model/Cliente.php';
    session_start();

    if (isset($_POST['nombre'])) {
        $cliente = new Cliente($_POST['nombre'],null);
        $cliente->asignarToken();
        $cliente->insert();

        session_start();
        $_SESSION['cliente'] = serialize($cliente);
        
        include '../View/muestraToken.php';
    }

?>