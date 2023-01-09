<?php 
    include_once '../Model/Usuario.php';

    $comprobacion = Usuario::getUsuarioByLogin($_POST['usuario'],$_POST['contraseña']);

    if ($comprobacion == false) {
        $data['tipoFallo'] = 1;
        include '../View/LoginFallido.php';
    }
    else{
        $perfil = $comprobacion->getPerfil();

        if ($perfil == "paciente") {
            session_start();
            $_SESSION['usuario'] = serialize($comprobacion);
            include '../View/loginAceptado.php';
        }
        else if ($perfil == "medico") {
            $data['tipoFallo'] = 0;
            include '../View/loginFallido.php';
        }
    }
?>
