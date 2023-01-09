<?php 
    session_start();
    $_SESSION['usuario'] = "";
    $_SESSION['fecha'] = "";
    $_SESSION['medico'] = "";

    header("Location: ../index.php");
?>