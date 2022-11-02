<?php
if (!isset($_COOKIE['cookie'])) {
    setcookie('cookie', serialize(array(0, 0)), time() + (60 * 60 * 24 * 90), "/");

    header('Refresh: 0 url=./Ejercicio2.php');
} 
else {
    session_start();
    if (!isset($_SESSION['sesion'])) {
        $_SESSION['sesion'] = array(0, 0);
    }

    $_SESSION['sesion'] = unserialize($_COOKIE['cookie']);

    if (isset($_GET['voto'])) {
        if ($_GET['voto'] == 'si') {
            $_SESSION['sesion'][0]++;
        } else {
            $_SESSION['sesion'][1]++;
        }

        setcookie('cookie', serialize($_SESSION['sesion']), time() + (60 * 60 * 24 * 90), "/");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        body {
            height: 100vh;
        }

        .container {
            display: flex;
            margin: 50px;
        }

        .cuadrado {
            height: 30px;
            width: 30px;
            margin: 0px 10px 0px 10px;
        }

        .verde {
            background-color: green;
        }

        .rojo {
            background-color: red;
        }

        .boton {
            background-color: white;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1>¿Crees que actualmente hay corrupción en el gobierno?</h1>
    <?php
    echo '<div class="container"> 
                <h2>SI</h2>';

    for ($i = 0; $i < $_SESSION['sesion'][0]; $i++) {
        echo '<div class="cuadrado verde"></div>';
    }

    echo '</div>';

    echo '<div class="container"> 
                <h2>NO</h2>';

    for ($i = 0; $i < $_SESSION['sesion'][1]; $i++) {
        echo '<div class="cuadrado rojo"></div>';
    }

    echo '</div>';
    ?>
    <a href="./Ejercicio2.php?voto=si" class="boton">Si</a>
    <a href="./Ejercicio2.php?voto=no" class="boton">No</a>
</body>

</html>