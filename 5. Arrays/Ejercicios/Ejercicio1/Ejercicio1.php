<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_GET['array'])) {
        $array;

        for ($i = 0; $i < 100; $i++) {
            $array[$i] = 0;
        }
    } else {
        $array = unserialize($_GET['array']);
    }

    $contador = 0;

    echo '<table>';

    for ($i = 0; $i < 100; $i++) {
        if ($contador == 0) {
            echo '<tr>';
        }

        if ($array[$i] == 0) {
            $imagen = "./images/ojoCerrado.jpg";
        } else {
            $imagen = './images/ojoAbierto.jpg';
        }

        echo '<td><a href="./Ejercicio1-Validacion.php?array=' . serialize($array) . '&posicion=' . $i . '"><img src="' . $imagen . '"></a></td>';
        $contador++;


        if ($contador == 10) {
            echo '</tr>';
            $contador = 0;
        }
    }

    echo '</table>';
    ?>
</body>

</html>