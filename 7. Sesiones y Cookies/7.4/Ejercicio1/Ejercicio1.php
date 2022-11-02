<?php
function creadorColoresHex()
{
    $arrayHexa = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f');

    $resultado = '';

    for ($i = 0; $i < 6; $i++) {
        $resultado = $resultado . strval($arrayHexa[rand(0, count($arrayHexa) - 1)]);
    }

    return $resultado;
}

session_start();
if (!isset($_SESSION['colores'])) {
    $_SESSION['colores'] = array();
}

if (isset($_GET['añadir'])) {
    $fondo = creadorColoresHex();
    array_push($_SESSION['colores'], $fondo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        body {
            background-color: <?php echo  '#' . $fondo; ?>;
            height: 100vh;
            width: 100vw;
        }

        a {
            padding: 10px 20px;
            margin: 10px auto;
            background-color: white;
            color: black;
            border: 1px solid black;
            text-decoration: none;
            border-radius: 10px;
        }

        .container {
            margin: 100px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="./Ejercicio1.php?añadir=">Añadir color</a>
        <a href="./Ejercicio1-Paleta.php">Mostrar la paleta de colores</a>
    </div>
</body>

</html>